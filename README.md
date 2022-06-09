# WEBTECHproject

# Gallery site

The site is a simple gallery where users can upload their pictures, to which they can give descriptions and such and they will be able to delete it if they want to.

---

# Execution

The site will be written using the following languages:

- HTML
- CSS
- Javascript
- PHP

<aside>
📄 Main page

</aside>

The main page will show all of the uploaded pictures in a dynamic flexible grid view (Pinterest-like). Under the picture in a small footer it will show information about the uploaded image, such as who uploaded the photo, when was it uploaded and the title of it.

![Untitled](https://i.stack.imgur.com/sLOOW.jpg)

<aside>
⤴️ Header

</aside>

On the header you will see different buttons, depending on your “user status”. 

There will be a home button for guests and users alike, that when you press, will take you back to the main page.

If you are a guest, you will be able to ***register*** or ***login.***

If you are a user, you will be able to ***logout*** and ***upload an image.***

<aside>
🖼️ Picture view

</aside>

The picture view is a dedicated site where you can see the image that you chose to check out on the main page.

The functionality of this page will be dependent as well on your “user status” as well

### As a user or guest (not owner of the picture)

You will be able to view the picture, see the description that the owner gave, the title of the image and the date of the uploading.

### As an owner of the picture

You will be able to modify the description and the title of the image or delete the image itself.

<aside>
📄 Register page

</aside>

This page will register new users to the site. 

It will require the users e-mail address, a display name and a password (that has to be repeated). Layout-wise it will be similar to the attached picture.

It will also contain a client-side verification and a server-side verification after pressing the ***Register*** button (meaning it will check if the e-mail you inputted is a valid e-mail address, if the display name is already taken or not, and the password has to be secure enough as well)

The site will store the password in the database in an encrypted way for security reasons.

![Untitled](https://www.phptutorial.net/wp-content/uploads/2021/09/php-registration-form.png)

<aside>
📄 Login page

</aside>

The login form will be similar to the registry page but it will only require the display name (or the e-mail address) of the user and the password.

If the username or the password is incorrect, the page will show an error.

---
