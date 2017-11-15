n=int(input("enter the number"))
a=0
b=1
count=0
while(count<n):
   c=a+b
   a=b
   b=c
   print(c)
   count+=1
