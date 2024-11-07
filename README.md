# Inventory Management System

## Local Hosting
Then run the apache server and mysql. And then create a database called `group16` and import the `group16.sql` file.
then go to the `http://localhost/InventoryManagementSystem-DCS/Project/` to access the IMS website</br></br>


## Login
- **Username:** masteradmin
- **Password:** 123456789

**-New Modifications-**

## DashBoard
Modified dashboard to show filtered data for easy handling
- Total Summery (Total Quantity and Total Cost of items in each Lab, office and furniture sections)
- Alerts: Warrenty Remaining (Items tha has warrenty remaining less than 6 months)
- Pie Chart (Total quantity of items in each section for easy understaning)
- Items Not Working (items currently marked as not working)

## Home Page
In the home page navbar, there are 3 links:

1. **Lab Equipments, Add Lab Equipments, Form A and Form B**
2. **Office Equipments, Add Office Equipments, Form A and Form B**
3. **Furniture, Add Furniture, , Form A and Form B**

## Add Article

### 1) Add Lab Equipments
To add a Lab Invoice, you need to fill in all the input fields, including:
- Article Name
- Date
- Price (Per Unit)
- Quantity (How many items need to be added)
- Warrenty Period
- Inventory Number (Folio Number)
- Description
- Supplier Name
- Supplier T.P. (telephone number)
- SRN Number
- Page Number
- Location (Which location this will be located, e.g., CUL3&4, CUL 1)
- Type Of One Unit (You need to select which type this will be, Desktop or laptop or electronic)
- After selecting only, you can add serial numbers.
    - Desktop has 4 types of serial numbers: CPU, Monitor, Keyboard, Mouse
    - Laptop has Model_number and Serial_number
    - Electronic has Only Serial_number and will show Item name if selected
- After filling in all the information, you can add the invoice to the database.

### 2) Add Office Equipments
To add an Office Invoice, you need to fill in all the input fields, including:
- Article Name
- Date
- Price (Per Unit)
- Quantity (How many items need to be added)
- Warrenty Period
- Folio Number
- Description
- Supplier Name
- Supplier T.P. (telephone number)
- SRN Number
- Page Number
- Location (Which location this will be located, e.g., CUL3&4, CUL 1)
- After filling in all the information, you can add serial numbers.
- After filling in all the details, you can add the invoice to the database.

### 3) Add Furniture Equipments
To add a Furniture Invoice, you need to fill in all the input fields, including:
- Article Name
- Date
- Price (Per Unit)
- Quantity (How many items need to be added)
- Warrenty Period
- Folio Number
- Description
- Supplier Name
- Supplier T.P. (telephone number)
- SRN Number
- Page Number
- Location (Which location this will be located, e.g., CUL3&4, CUL 1)
- After filling in all the details, you can add the invoice to the database.

## Searching

### 1) Search Lab Equipments
You can filter Lab Equipments by:
- Type of the category: Desktop, Laptop, Electronic
- Year
- Folio number
- Serial number

### 2) Search Office Equipments
You can filter Office Equipments by:
- Year
- Folio number
- Serial number

### 3) Search Furniture Equipments
You can filter Furniture Equipments by:
- Year
- Folio number
- Location

**-New Modifications-**

## Forms
You can select either Form A or Form B for Lab equipmets, Office equipmets or furniture

### 1) Form A
You can create table by selecting a certain year you want and then,
- Export to Excel (Download related excel sheet)
- Export to PDF (Show created Form A related to current DCS Form)
You can either remove or edit a certain item which affects only to the form

### 2) Form B
You can create table by selecting items not working, S, D, R or T (According to the report of Board of survey) and then, 
- Export to Excel (Download related excel sheet)
- Export to PDF (Show created Form B related to current DCS Form)
You can either remove or edit a certain item which affects only to the form


## Master Admin
master admin only can remove or add admin to system. 
