### Project work list

- [x] Constant.php : define constant variables, like :- local_environment = true/false, 
- [x] Server validationsection 
- [x] request validation (post/get/update/delete). If validation not meet then in else " send json response { success: false, message: "Request not available" }  ".
- [x]  form request validation (post-login/post-create-account/post-forget-password/etc...). If validation not meet then in else " send json response { success: false, message: "Request not available" }"
- [x] send json response { success: true, message: "" } then die; code.
- [x] If validation not succeed at any point, like my validation not succeed then send json response { success: false, data: array(errors) } then die; code.