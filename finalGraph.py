import matplotlib.pyplot as plt; plt.rcdefaults()
import numpy as np
import matplotlib.pyplot as plt
from matplotlib import pyplot as pltpie


afontSize = {'fontsize':'20', 'fontname':'DejaVu Sans'}


def facebook_bar():
    objects = ('2020', '2019', '2018', '2017', '2016', '2015')
    y_pos = np.arange(len(objects))
    performance = [10,8,6,4,2,1]
    plt.bar(y_pos, performance, align='center', alpha=0.5)
    plt.xticks(y_pos, objects)
    plt.ylabel('Usage in %')
    plt.title('Facebook 5 years usage',**afontSize)
    plt.show()

def facebook_pie():
    y = np.array([10,8,6,4,2,1])
    mylabels = ["2020", "2019", "2018", "2017", "2016", "2015"]
    pltpie.pie(y, labels = mylabels)
    plt.title('Facebook details',**afontSize)
    pltpie.show()

def instagram_bar():
    objects = ('2020', '2019', '2018', '2017', '2016', '2015')
    y_pos = np.arange(len(objects))
    performance = [10,8,6,4,2,1]
    plt.bar(y_pos, performance, align='center', alpha=0.5)
    plt.xticks(y_pos, objects)
    plt.ylabel('usage in %')
    plt.title('Instagram 5 years usage',**afontSize)
    plt.show()

def instagram_pie():
    y = np.array([10,8,6,4,2,1])
    mylabels = ["2020", "2019", "2018", "2017", "2016", "2015"]
    pltpie.pie(y, labels = mylabels)
    plt.title('Instagram details',**afontSize)
    pltpie.show() 

def linkedin_bar():
    objects = ('2020', '2019', '2018', '2017', '2016', '2015')
    y_pos = np.arange(len(objects))
    performance = [10,8,6,4,2,1]
    plt.bar(y_pos, performance, align='center', alpha=0.5)
    plt.xticks(y_pos, objects)
    plt.ylabel('Usage in %')
    plt.title('Linkedin 5 years usage',**afontSize)
    plt.show()


def linkedin_pie():
    y = np.array([10,8,6,4,2,1])
    mylabels = ["2020", "2019", "2018", "2017", "2016", "2015"]
    pltpie.pie(y, labels = mylabels)
    plt.title('LinkenIn details',**afontSize)
    pltpie.show() 


def twitter_bar():
    objects = ('2020', '2019', '2018', '2017', '2016', '2015')
    y_pos = np.arange(len(objects))
    performance = [10,8,6,4,2,1]
    plt.bar(y_pos, performance, align='center', alpha=0.5)
    plt.xticks(y_pos, objects)
    plt.ylabel('Usage in %')
    plt.title('Twitter 5 years usage',**afontSize)
    plt.show()

def twitter_pie():
    y = np.array([10,8,6,4,2,1])
    mylabels = ["2020", "2019", "2018", "2017", "2016", "2015"]
    pltpie.pie(y, labels = mylabels)
    plt.title('Twitter details',**afontSize)
    pltpie.show()


##For Each Main menu option.. we will call it's graph types using below methods..

def facebook():
    #Here option 1 is selected in Main menu.. So calling this method.
    print("You have Selected Facebook")
    print("---------------FACEBOOK---------------")
    graphType=readType()
    while graphType != 'q':
        if graphType == '1':
            facebook_bar()
        elif graphType == '2':
            facebook_pie()
        elif graphType == 'q':
            print("exiting this graph menu")
            break
        else:
            print("Enter valid input")
        graphType=readType()

def instagram():
    #in main menu opt 2 is selected so calling this method
    print("You have Selected Instagram")
    print("---------------INSTAGRAM---------------")
    graphType=readType()
    while graphType != 'q':
        if graphType == '1':
            instagram_bar()
        elif graphType == '2':
            instagram_pie()
        elif graphType == 'q':
            print("exiting this graph menu")
            break
        else:
            print("Enter valid input")
        graphType=readType()

def linkenin():
    #opt 3 is selected in main menu so calling this method
    print("You have Selected LinkedIn")
    print("---------------LINKEDIN---------------")
    graphType=readType()
    while graphType != 'q':
        if graphType == '1':
            linkedin_bar()
        elif graphType == '2':
            linkedin_pie()
        elif graphType == 'q':
            print("exiting this graph menu")
            break
        else:
            print("Enter valid input")
        graphType=readType()

def twitter():
    # opt 4 is selected in main menu so callin this method
    print("You have Selected Twitter")
    print("---------------TWITTER---------------")
    graphType=readType()
    while graphType != 'q':
        if graphType == '1':
            twitter_bar()
        elif graphType == '2':
            twitter_pie()
        elif graphType == 'q':
            print("exiting this graph menu")
            break
        else:
            print("Enter valid input")
        graphType=readType()


def readMain():
    print("---------------MAIN MENU---------------")
    print("\t1.\tFacebook")
    print("\t2.\tInstagram")
    print("\t3.\tLinkenIn")
    print("\t4.\tTwitter")
    print("Choose any options (1,2,3 or 4)")
    print("Enter q to quit the Main Menu")
    inp_main=input()
    return inp_main

def readType():
    print("--------------GRAPH MENU---------------")
    print("\t1.\tBar Graph")
    print("\t2.\tPie Chart")
    print("Enter q to exit the Graph Menu")
    inp_graph=input()
    return inp_graph

def whileLoop():
    options=readMain()
    while options != 'q':
        if options == '1':
            facebook()
        elif options == '2':
            instagram()
        elif options == '3':
            linkenin()
        elif options == '4':
            twitter()
        elif options == 'q':
            print("Quitting from main menu")
            break
        else:
            print("Invalid input. please valid options")
        options=readMain()
        

sg.Window(title="HelloWorld", layout=[[]], margins=(100,50)).read()

#whileLoop()