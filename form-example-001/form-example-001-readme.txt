This form uses field sets to hide and show sets of questions.  Upon successful submission, the form will redirect to a website.  Upon generation of an error a message will be displayed containing further instructions.

Note: originally this email had a form with 3 questions, however I was having issues with including 2 sliders in one form.  Going to do some debugging and testing to see if its an actual issue or user error.


Validator Issues (amp.gmail.dev)
- If you select a valid loan reason and then hit submit on the form, you will receive a success message, however you will not send you to the url. I believe this is because the iframe doesn't har allow-top-navigation flag so no redirecting is allowed

- Testing the error message does work in the validator.

Test Email Sent from Validator
-From the validator, if you send yourself a test email, the error message, nor the url redirect will work. Not sure if these are security features for email or if I am doing something incorrectly. I am currently researching this.

