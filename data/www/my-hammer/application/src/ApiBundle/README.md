## API endpoint

|  |  |
| ------ | ------ |
| Description | Add new claim
| URL | /api/v1/create
| Methods | POST
| Request Body | JSON application/json 
| Success Response | { "code" : 1003, "message" : "Claim added successfully", "data" : { "id" : 19 } }
| Error Response | { "code" : 1007, "message" : "Input is wrong", "errors" : { "title" : "This value is too short. It should have 5 characters or more." } }               

#### Request-body example:

{ <br/>
&nbsp;&nbsp;&nbsp;&nbsp;"title": "lorem isput dolor", <br/>
&nbsp;&nbsp;&nbsp;&nbsp;"zip":88131, <br/>
&nbsp;&nbsp;&nbsp;&nbsp;"city":"Au", <br/>
&nbsp;&nbsp;&nbsp;&nbsp;"description":"Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum ",<br/>
&nbsp;&nbsp;&nbsp;&nbsp;"due_date":"2019-12-12",<br/>
&nbsp;&nbsp;&nbsp;&nbsp;"category":"802030" <br/>
} 
    