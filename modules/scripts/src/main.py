import json

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
    dbc = mysql.connector.connect(user='piWatch',password='Cybersec$314',database='nscan')
    return dbc
