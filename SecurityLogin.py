import hashlib
import threading
import secrets
import binascii

def getPassword():
    UserPass = input("Please enter password: ")
    return UserPass

def ThreadA(UserPass):
    SideA = open("SideA.txt", "r")
    ServHashA = SideA.readline()
    ByServHashA = str.encode(ServHashA)
    ServSaltA = SideA.readline()
    ByServSaltA = str.encode(ServSaltA)
    HashA = hashlib.pbkdf2_hmac('sha512', UserPass, ByServSaltA, 250000)
    HexHashA = binascii.hexlify(HashA)
    ByServHashA = ByServHashA.rstrip()
    if ByServHashA == HexHashA:
        print("Check A Match")
    else:
        print("Check A Fail")

def ThreadB(UserPass):
    SideB = open("SideB.txt", "r")
    ServHashB = SideB.readline()
    ByServHashB = str.encode(ServHashB)
    ServSaltB = SideB.readline()
    ByServSaltB = str.encode(ServSaltB)
    HashB = hashlib.pbkdf2_hmac('sha256', UserPass, ByServSaltB, 300000)
    HexHashB = binascii.hexlify(HashB)
    ByServHashB = ByServHashB.rstrip()
    if ByServHashB == HexHashB:
        print("Check B Match")
    else:
        print("Check B Fail")

def main():
    print('start')
    UserPass = getPassword()
    ByUserPass = str.encode(UserPass)
    t1 = threading.Thread(target=ThreadA, args=(ByUserPass,))
    t2 = threading.Thread(target=ThreadB, args=(ByUserPass,))
    t1.start()
    t2.start()
    t1.join()
    t2.join()

main()