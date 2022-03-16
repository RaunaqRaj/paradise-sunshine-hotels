### Raunaq Project work list


- [ ] Customer-id encryption in get request
- [x] check-id in update and delete
- [x] Get delete and update request with encrypted customer id
- [x] validations in update query.

- [x] Customer-list.php
- [x] Customer_single.php
- [x] Add_Customer.php
- [x] Staff_type-list.php(add,delete,update,view).
- [x] staff_type_update.php
- [x] staff_type_add.php




- [ ] datatable error fix

- [x] user - (id, username, email, password , iv, usertype, created_at)
    usertype - (1=admin, 2=customer, 3=staff)

- [x] Customer = Id,  First_name , Last_name, email, Primary_Phone_Number, Secondary_Phone_Number created_at.
- [x] Customer_list.php , customer_single. , customer_add.php.

- [x] Staffs = Id, user_id, First_name , Last_name, Phone_Number, email, created_at.
- [x] staff_Types = Id, Designation, description, created_at.
- [ ] Staff_designation = Id, staff_id, staff_type_id , created_at.


<!-- manager : manages customer services , Room facilities , and staff details.
 || supervisor : adds staff details.
 || Receptionist : adds new customers, updates the customer details and extension in stay -->

<!-- ajax data format add staff in single form-->
 <!-- {
    user_details:{
        username:"",
        password:"",
        iv:"",
        name:"",
        email:"",
    }
    staf_detail:{ 
        f_name:"",
        l_name:"",
        email:"",
        p_no:"",
        s_no:"",
        staff_type_ids: [1,2,3,4,5]
     }
}
-->

- [x] Staff_list.php, Staff_single.php , staff_Add.php.


- [ ] Payment_Card = Id, customer_ID, Card_Number, Payment_Authority , Expiry_Date , Cvv, Created_at.

- [x] Reservations = Id, Customer_ID , Check_In, Check_out, Room_ID, Payment_ID , Status and created_at.
- [x] reservation_list.php, reservation_single.php.

- [x] Room_Category = ID , Name, Created_at.

- [x] Room_Facility_list = ID , Name(Comfortable Bed, Balcony_View, Food_Services), Price, Created_at.

- [x] Room_Facility = ID, Room_ID, Room_Facility_List_ID, Created_at

- [x] Room = ID, Room_category_ID, Image_id, Heading, Description, area_code, Location(google Maps Link), Price, Created_at.

- [x] Room_Image = ID, Room_ID, Image, Created_at

- [x] Room_list.php, Room_single.php.


- [ ] Payments = Id, Payment_ID, Mode_of_payments , Payments_Details ,Respected_Provider, Created_at.

<!-- {
    custtomer_detail:{ 
        f_name:"",
        l_name:"",
        email:"",
        p_no:"",
        s_no:"",
     },
     customer_card:[
         {
         card_no:"123456789",
         cvv:"",
         exp:""
        }
         {
         card_no:"908765432",
         cvv:"",
         exp:""
        }
    ]
} -->
<!-- fiu-vgzz-nsd -->

<!-- https://nukepin.in/demo/project/hotels/ -->