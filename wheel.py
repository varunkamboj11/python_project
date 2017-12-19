#create the account
#print("1>:signup")
#print("2>:create the acoount")
a=int(input("1>: Create the account \n 2>: Signup "))
if(a==1):
    b=input("Firstname: ")
    print("Avoid using coomon words and include a mix of letters and numbers ")
    c=input("Lastname: ")
    print("PASSWORD MUST CONTAIN 1 NUMERIC 1 CHARACTER MINIMUM LENGTH  6")
    v=str(input("E-mail"))
    r=input("Password: ")
    n=input("Re-Enter Password:")
    if(r!=n):
        print("PASSWORD INCORRECT")
    x=len(r)
    q=len(n)
    if(x and q >= 6):
        print("check your password")
    d=input('Location: ')
    e=input("Enter gender type: ")
    g=input("Enter country name: ")
    print("MM/DD/YYYY")
    h=str(input("Brithday"))
    f=input("submit")
    if(f=="submit"):
        print("YOU HAVE SUCEESSFULLY CREATED AN ACCOUNT ,\n,WELCOME TO dRINK ON wHEEL")
        f=open("test.txt",'w',encoding='utf-8')
        f.write('\n'+v)
        f.write('\n'+r)
        f.close()
if(a==2):
    #database="test.txt"
    p=input("Enter your e-mail")
    j=input("enter your password")
    f = open("test.txt", 'r', encoding='utf-8')
    database=f.read()
    if(p and j  in database):
        print("YOU ARE SUCCESSFULLY LOGIN ")
    else:
        print("TRY  AGAIN")








