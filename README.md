วิธีการเปิดโปรเจค postQA
1. ทำการใช้คำสั่ง git clone (ตามด้วยชื่อโปรเจค) เพื่อทำการ clone โปรเจค โดยที่ให้ไปวางไว้ในไฟล์ /htdocs ใน folder xampp เพื่อที่จะสามารถใช้งาน database phpMyAdmin ได้
2. เปิดโปรเจคด้วยโปรแกรม VScode หลังจากนั้นใน terminal ทำการติดตั้งส่วนเสริมโดยใช้คำสั่ง npm install
3. ต่อไปนี้จะเป็นส่วนเชื่อมต่อ database โดยจะอยู่ในไฟล์ .env เข้าไปในหน้า .env แล้วหา ส่วนเชื่อมต่อ database ดังหัวข้อด้านล่าง ใส่ข้อมูลชื่อ database username และ password ให้เรียบร้อย(อย่างลืมเอา # ออกด้วย)
* DB_CONNECTION=mysql
* DB_HOST=127.0.0.1
* DB_PORT=3306 หรือ 3308 // หากเชื่อมต่อฐานข้อมูลไม่ได้ให้ไปดูที่ XAMPP ในส่วนของ MySQL Database ให้ไปดูที่ configure ว่าอยู่ PORT ใหน
* DB_DATABASE= ใส่ชื่อdatabase ที่สร้างใน phpMyAdmin
* DB_USERNAME=root
* DB_PASSWORD=
4. ทำการเปิด server ใน XAMPP โดยเข้าไปที่โปรแกรม XAMPP กดไปในหน้า Manage Servers แล้วstart MySQL Database กับ Apache Web Server
5. หลังจากนั้นกลับมาที่หน้า VSCode ในส่วน terminal ใช้คำสั่ง php artisan migrate เพื่อทำการสร้าง table ใน database 
6. หลังจากสร้าง table เรียบร้อยแล้ว หลังจากนี้จะเป็นการเปิดหน้าเว็บ
7. เข้าผ่านทาง localhost โดยเอามใช้ link นี้  http://localhost/bangkok-post/public/
8. ทำการสร้าง user เพื่อเข้าใช้งานโปรเจค
9. หลังจากนั้นเข้าไปในหน้า create question เพื่อสร้างคำถาม 10 ข้อ 
10. หลังจากสร้างคำถามเรียบร้อยแล้วเข้าไปหน้า questionnaires เพื่อดู หัวข้อคำถาม
11. กดที่ “ตอบ” เพื่อเข้าไปหน้า question ไปตอบคำถาม
12. หลังจากตอบคำถามเรียบร้อยสามารถเข้าไปดูคำตอบของเราได้ในหน้า My Answer
