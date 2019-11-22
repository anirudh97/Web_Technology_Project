
from flask import Flask, flash, redirect, render_template, request, session, abort
from flask import Flask, redirect, url_for, request
from flask import json
import numpy as np
import pandas as pd
from sklearn.naive_bayes import GaussianNB
from sklearn.preprocessing import LabelEncoder
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
app = Flask(__name__)

@app.route('/result',methods=["POST"])

def funct():
    data = pd.read_csv("xAPI-Edu-Data.csv")
    number = LabelEncoder()
    data['gender'] = number.fit_transform(data['gender'])
    #print(data['gender'])
    data['PlaceofBirth'] = number.fit_transform(data['PlaceofBirth'])
    data['StageID'] = number.fit_transform(data['StageID'])
    data['Topic'] = number.fit_transform(data['Topic'])
    data['ParentInteractionLevel'] = number.fit_transform(data['ParentInteractionLevel'])
    data['StudentAbsenceDays'] = number.fit_transform(data['StudentAbsenceDays'])
    #a['ParentInteractionLevel'] = number.fit_transform(play_tennis['ParentInteractionLevel'])
    features = ["gender","PlaceofBirth","StageID","Topic","ParentInteractionLevel","StudentAbsenceDays" ]
    target = "Class"
    features_train, features_test, target_train, target_test = train_test_split(data[features],data[target],test_size = 0.33,random_state = 54)
    model = GaussianNB()
    model.fit(features_train, target_train)
    #accuracy = accuracy_score(target_test, pred)
    #print(accuracy)

    gender={"F":0,"M":1}
    state={"Andhra Pradesh":0,"Assam":1,"Bihar":2,"Gujarat":3,"Jammu Kashmir":4,"Karnataka":5,"Kerala":6,"Orissa":7,"Punjab":8,"Rajasthan":9,"Sikkim":10,"Tamil Nadu":11,"West Bengal":12}
    education={"highschool":0,"lowerlevel":1,"middleschool":2}
    topic={"Arabic":0,"Biology":1,"Chemistry":2,"English":3,"French":4,"Geology":5,"History":6,"IT":7,"Math":8,"Quran":9,"Science":10,"Spanish":11}
    interaction={"Bad":0,"Good":1}
    absence={"Above-7":0,"Under-7":1}
    l=[]
    l.append(gender[request.form['gender']])
    l.append(state[request.form['state']])
    l.append(education[request.form['education']])
    l.append(topic[request.form['topic']])
    l.append(interaction[request.form['interaction']])
    l.append(absence[request.form['absence']])



    ans=model.predict([l])
    f = open("ans.txt","w")
    f.write(ans[0])
    f.close()
    #print(request.form['gender'])
    return json.jsonify({}),200


if __name__ == '__main__':
    app.run(host='127.0.0.1',port=8080,debug=False)
