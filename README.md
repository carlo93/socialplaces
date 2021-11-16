<h2>PHP Laravel Project</h2>

<p>This is a complete <b>MVC≤/b> project consisting of a contact form on the initial landing page which will send a email response to the user that completes this form.</p>
    
    <p>Also included:</p>
    
    - DB Contact Table which stores the form data submitted on the contact page.
    - DB Gender Table which is relational to the contact table in terms of capturing and retrieving the gender name.
    - The Contact form submits via ajax and does not include the vue js framework functionality as this has been something I have struggled to implement successfully amongst other delaying factors.
    - Registration and Login pages are also accessible through the navigation bar on the top of the pages.
    - On succesful login the user lands on the dashboard page which consists of a datatable displaying the contact details of the users who submitted the form.
    - The logged in user will be able to see the content of each entry through a modal which is accessible once they click the show button.
    - The logged in user can also delete table entries via the delete button per row.
    - Filtering and report capturing is also made available through the datatable.
    
    
<p>Steps to setup the project:</p>

- Make sure you have php 7 of greater.
- Install composer if not installed already. 
- Make sure you have laravel 8 of greater.
- Install Node Js if not installed already.
- Depending on the development environment setup you may have will give you browser access to the project however note that you can run php artisan serve to access the application through the brower.

Also run php artisan migrate:fresh seed

Alternatively see the link for installation and configuration purposes => https://laravel.com/docs/8.x 

Feel free to contact me on smallcarlo@gmail.com if you seem to find yourself stuck...
