# Inventory Management System

Then run the apache server and mysql. And then create a database called `project_1` and import the `project_1.sql` file.
then go to the `http://localhost/Project/` to access the ERS website</br></br>


Then open the project file in composer teminal. (open the composer terminal and then `cd C:/xampp/htdocs/ERS-Project` and then enter).</br>

Then enable these extensions in your `php.ini` file (`C:\xampp\php`).</br>

<ol><li>extension=gd</li><li>extension=fileinfo</li><li>extension=zip</li></ol></br>

To enable this, you have to do the following:</br>



## Login
 http://imsdcs.free.nf 
- **Username:** 2020g8
- **Password:** !2qwasZX

## Home Page
In the home page navbar, there are 3 links:

1. **Lab Equipments and Add Lab Equipments**
2. **Office Equipments and Add Office Equipments**
3. **Furniture and Add Furniture**

## Add Article

### 1) Add Lab Equipments
To add a Lab Invoice, you need to fill in all the input fields, including:
- Article Name
- Date
- Price (Per Unit)
- Quantity (How many items need to be added)
- Folio Number
- Description
- Supplier Name
- Supplier T.P. (telephone number)
- SRN Number
- Location (Which location this will be located, e.g., CUL3&4, CUL 1)
- Type Of One Unit (You need to select which type this will be, Desktop or laptop or electronic)
- After selecting, you can add serial numbers.
    - Desktop has 4 types of serial numbers: CPU, Monitor, Keyboard, Mouse
    - Laptop has Model_number and Serial_number
    - Electronic has Only Serial_number
- After filling in all the information, you can add the invoice to the database.

### 2) Add Office Equipments
To add an Office Invoice, you need to fill in all the input fields, including:
- Article Name
- Date
- Price (Per Unit)
- Quantity (How many items need to be added)
- Folio Number
- Description
- Supplier Name
- Supplier T.P. (telephone number)
- SRN Number
- Location (Which location this will be located, e.g., CUL3&4, CUL 1)
- After filling in all the information, you can add serial numbers.
- After filling in all the details, you can add the invoice to the database.

### 3) Add Furniture Equipments
To add a Furniture Invoice, you need to fill in all the input fields, including:
- Article Name
- Date
- Price (Per Unit)
- Quantity (How many items need to be added)
- Folio Number
- Description
- Supplier Name
- Supplier T.P. (telephone number)
- SRN Number
- Location (Which location this will be located, e.g., CUL3&4, CUL 1)
- After filling in all the details, you can add the invoice to the database.

## Searching

### 1) Search Lab Equipments
You can filter Lab Equipments by:
- Type of the category: Desktop, Laptop, Electronic
- Year
- Folio number
- Serial number

You can export filtered or unfiltered articles to Excel.

### 2) Search Office Equipments
You can filter Office Equipments by:
- Year
- Folio number
- Serial number

You can export filtered or unfiltered articles to Excel.

### 3) Search Furniture Equipments
You can filter Furniture Equipments by:
- Year
- Folio number
- Location

You can export filtered or unfiltered articles to Excel.


## Master Admin

master admin only can remove or add admin to system. 