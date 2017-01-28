import json
import mysql.connector

def readModuleData():
    f = open('../modules.json', 'r')
    mData = json.loads(f.read())
    f.close()
    for key in mData:
        try:
            mData[key]['moduleName']
        except KeyError:
            mData[key]['moduleName'] = 'Unknown'

        try:
            mData[key]['dependencies']
        except KeyError:
            mData[key]['dependencies'] = []
    return mData

def getDatabaseConnection():
    dbc = mysql.connector.connect(user='cybersec',password='Cybersec$314',database='piwatch')
    return dbc

def getDatabaseData(databaseString):
    dbData = {
        'User': databaseString.split(':')[0],
        'Password': databaseString.split(':')[1].split('@')[0],
        'Host': databaseString.split(':')[1].split('@')[1],
    }
    return dbData

def getDatabaseString(databaseObject):
    return '{}:{}@{}'.format(databaseObject['User'], databaseObject['Password'], databaseObject['Host'])
