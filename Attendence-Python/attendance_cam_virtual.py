# face_recog.py
import cv2, sys, numpy, os
import requests
import json
import time
import random
import serial
import array
import datetime


#configration 
CLASS_ROOM = "BCA"
port = "COM4"


# end of configration




date_format = '%d-%m-%Y/%H:%M:%S'
today_date_and_time = None

try:
    date_string = sys.argv[1]
    date_obj = datetime.datetime.strptime(date_string, date_format)
    print("Time:")
    print(date_obj.time())
    today_date_and_time = date_obj;
except ValueError:
    print("Incorrect date  format, should be DD-MM-YYYY/HH:MM:SS")
    sys.exit(0)
 



host = 'http://localhost/AttedenceUpdate/'




class Student:
    def __init__(self, rollNo, name, imagePath):
        
        self.rollNo = rollNo
        self.name = name
        self.imagePath = imagePath



class RfIdResponse:
    def __init__(self, className, subName, teacherName, teacherEmail):
        
        self.className = className
        self.subName = subName
        self.teacherName = teacherName
        self.teacherEmail = teacherEmail
        


def getClassData(rf_id,currentTime):
    request_url = host + 'get-class-for-attendence.php'
    request_data = {'rf_id':rf_id,
                    'time':currentTime}
    print("Request :",request_data)
    request_result = requests.post(request_url,request_data)
    print("Request Result :",request_result.text)
    rmfIdResponse = json.loads(request_result.text)
    myfIdResponse = RfIdResponse(rmfIdResponse['className'], rmfIdResponse['subName'], rmfIdResponse['teacherName'], rmfIdResponse['teacherEmail'])
    return myfIdResponse


def getStudentOfClass(class_name):
    students_list_request = host + 'get-students-of-class.php'
    request_data = {"class_name": class_name}
    print("Request :",request_data)
    result_list = requests.post(students_list_request,request_data)
    print("Request Result :",result_list.text)
    students_obj= json.loads(result_list.text)
    students = []
    for student_obj in students_obj:
        mStudent = Student(student_obj['rollNo'], student_obj['name'], student_obj['imagePath'])
        students.append(mStudent)
        
    return students


def getRollNoFromStudent(students,face):
    for student in students:
        if student.imagePath == face:
            return student.rollNo
    return -1


def submitAttendance(class_room, sub, rfid, date, attendence):
    attedence_submit_request = host + 'submit-attendence-for-python.php'
    request_data = {"class": class_room,
                    "sub":sub,
                    "rfid":rfid,
                    "date":date,
                    "attendence":attendence}
    print("Request :",request_data)
    result_list = requests.post(attedence_submit_request,request_data)
    print("Request Result :",result_list.text)
    
    




# submit step register otp for entrance
def submitLogRequest(className, date, attedence):
    registration_url = host + 'attendence_request_python.php'
    print("Start:")
    #data  = getPostArray(attedence)
    registration_data = {'submit_attedence':'Dummy',
                         'class_name':className,
                         'date':date,
                         'attedence':json.dumps(attedence)}
    print(registration_data)
    
    result_registration = requests.post(registration_url,registration_data)
    print(result_registration.text)

    













def getFacesFromImageProcessing():
    size = 2
    fn_haar = 'haarcascade_frontalface_default.xml'
    fn_dir = 'att_faces'



    # Part 1: Create fisherRecognizer
    print('Training...')


    capture = False

    faces_name = []

    # Create a list of images and a list of corresponding names
    (images, lables, names, id) = ([], [], {}, 0)

    # Get the folders containing the training data
    for (subdirs, dirs, files) in os.walk(fn_dir):

        # Loop through each folder named after the subject in the photos
        for subdir in dirs:
            names[id] = subdir
            subjectpath = os.path.join(fn_dir, subdir)

            # Loop through each photo in the folder
            for filename in os.listdir(subjectpath):

                # Skip non-image formates
                f_name, f_extension = os.path.splitext(filename)
                if(f_extension.lower() not in
                        ['.png','.jpg','.jpeg','.gif','.pgm']):
                    print("Skipping "+filename+", wrong file type")
                    continue
                path = subjectpath + '/' + filename
                lable = id

                # Add to training data
                images.append(cv2.imread(path, 0))
                lables.append(int(lable))
            id += 1
    (im_width, im_height) = (112, 92)

    # Create a Numpy array from the two lists above
    (images, lables) = [numpy.array(lis) for lis in [images, lables]]

    # OpenCV trains a model from the images
    # NOTE FOR OpenCV2: remove '.face'
    #model = cv2.face.createFisherFaceRecognizer()
    #model = cv2.face.FisherFaceRecognizer_create()
    model = cv2.face.LBPHFaceRecognizer_create()
    #model = cv2.face.LBPHFaceRecognizer_create()
    #model = cv2.face.EigenFaceRecognizer_create()
    model.train(images, lables)




    # Part 2: Use fisherRecognizer on camera stream
    haar_cascade = cv2.CascadeClassifier(fn_haar)
    webcam = cv2.VideoCapture(0)
    while True:

        # Loop until the camera is working
        rval = False
        while(not rval):
            # Put the image from the webcam into 'frame'
            (rval, frame) = webcam.read()
            if(not rval):
                print("Failed to open webcam. Trying again...")

            
        # Flip the image (optional)
        frame=cv2.flip(frame,1,0)
        if capture:
            capture = False
            # Convert to grayscalel
            gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

            # Resize to speed up detection (optinal, change size above)
            mini = cv2.resize(gray, (int(gray.shape[1] / size), int(gray.shape[0] / size)))

            # Detect faces and loop through each one
            faces = haar_cascade.detectMultiScale(mini)
            for i in range(len(faces)):
                face_i = faces[i]

                # Coordinates of face after scaling back by `size`
                (x, y, w, h) = [v * size for v in face_i]
                face = gray[y:y + h, x:x + w]
                face_resize = cv2.resize(face, (im_width, im_height))

                # Try to recognize the face
                prediction = model.predict(face_resize)
                cv2.rectangle(frame, (x, y), (x + w, y + h), (0, 255, 0), 3)

                # [1]
                # Write the name of recognized face
                #cv2.putText(frame,'%s - %.0f' % (names[prediction[0]],prediction[1]),(x-10, y-10), cv2.FONT_HERSHEY_PLAIN,1,(0, 255, 0))
                if prediction[1]<150:
                    cv2.putText(frame,'%s - %.0f' % (names[prediction[0]],prediction[1]),(x-10, y-10), cv2.FONT_HERSHEY_PLAIN,1,(0, 255, 0))
                                
                    print('%s - %.0f' % (names[prediction[0]],prediction[1]))
                    faces_name.append(names[prediction[0]])
                    
                else:
                    cv2.putText(frame,'not recognized',(x-10, y-10), cv2.FONT_HERSHEY_PLAIN,1,(0, 0, 255))

            print(len(faces_name))
            cv2.imshow('Click & Press C to capture, D to submitt', frame)
            
        # Show the image and check for ESC being pressed
        #if captureAgain:
        cv2.imshow('Click & Press C to capture', frame)


        
        Key = cv2.waitKey(1)
        if Key == 27:
            cv2.destroyAllWindows()
            break
        elif Key & 0xFF == ord('C') or Key & 0xFF == ord('c'):
            print("Capture True")
            faces_name = []
            capture = True
        elif Key & 0xFF == ord('D') or Key & 0xFF == ord('d'):
            print("Done")
            capture = True
            cv2.destroyAllWindows()
            return faces_name
















                        




    
if __name__=="__main__":
    print('__main__')
	
    

    
    baud = 9600
    DATE = today_date_and_time
    #DATE = datetime.today().strftime('%d-%m-%Y')
 
    '''serialPort = serial.Serial(port, baud, timeout=1)
    # open the serial port
    if serialPort.isOpen():
        print(serialPort.name + ' is open...')'''

    while True:
        '''oprationStatus = str(serialPort.readline());
        if oprationStatus.__contains__('<rfidtagid>') and oprationStatus.__contains__('</rfidtagid>'):
            dataStrTagId = oprationStatus.split('<rfidtagid>')[1]
            dataStrTagId = dataStrTagId.split('</rfidtagid>')[0]
            print("TAG Id is : "+dataStrTagId)'''
        print("RFID:")
        
        dataStrTagId = str(input())
        if dataStrTagId != None:            
            rfID = dataStrTagId #'8987778'
            
            myrfIdResponse = getClassData(rfID, today_date_and_time.time())

            if myrfIdResponse.className.__contains__('RF_ID_NOT_REGISTRED'):
                print("!Your RFID card is not registred")
            elif myrfIdResponse.className.__contains__('INVALID_TIME_OR_CLASS'):
                print("!Invalid  time or class room Please check time table")
            else:
                print(myrfIdResponse)
                if not myrfIdResponse.className  == CLASS_ROOM:
                    print("Invalid class room according to time table please check time table!")
                    continue
                    
                students = getStudentOfClass(myrfIdResponse.className)
                print("students :",students)
                
            
                faces = getFacesFromImageProcessing()
                print("faces :",faces)
                attendence = []
                if not students == None:
                    for face in faces:
                        rollNo = getRollNoFromStudent(students,face)
                        if not rollNo == -1:
                            attendence.append(rollNo)

                print("ATTENDANCE :",attendence)
                #continue
            
                if len(attendence) < 1:
                    print("0 student detected from this class Fail to submit Attendence")
                    continue
            
                print(type(attendence))
                print(json.dumps(attendence))
                #submitAttendance(class_room, sub, rfid, date, attendence):
                submitAttendance(myrfIdResponse.className, myrfIdResponse.subName, rfID, today_date_and_time.date(),json.dumps(attendence))
                #submitLogRequest(myrfIdResponse.className, today_date_and_time.date(),attendence)

            
   






















        



        
