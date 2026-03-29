<div align="center">
  <img src="https://i.pinimg.com/564x/72/2c/57/722c5710002814308caff02ffb294c0d.jpg" alt="University Logo" width="150" />

  <h2>DAFFODIL INTERNATIONAL UNIVERSITY</h2>
  <h4>Faculty of Science and Information Technology (FSIT)<br>Department of Computer Science & Engineering (CSE)</h4>

  <br>
  <h1>LAB REPORT 04</h1>
  <br>

  <table style="margin: 0 auto; text-align: left; width: 60%; font-size: 1.1em; border: none;">
    <tr><td style="border: none;"><strong>Course Title</strong></td><td style="border: none;">: Web Engineering & Lab</td></tr>
    <tr><td style="border: none;"><strong>Course Code</strong></td><td style="border: none;">: CSE414 / CSE415</td></tr>
    <tr><td style="border: none;"><strong>Program</strong></td><td style="border: none;">: B.Sc. in Computer Science & Engineering</td></tr>
    <tr><td style="border: none;"><strong>Semester</strong></td><td style="border: none;">: Spring</td></tr>
    <tr><td style="border: none;"><strong>Year</strong></td><td style="border: none;">: 2026</td></tr>
  </table>

  <br><br>

  <div style="display: flex; justify-content: space-between; text-align: left; width: 80%; margin: 0 auto;">
    <div style="width: 45%;">
      <h3>Submitted To</h3>
      <p>
        <strong>Md. Shah Jalal (Jamil)</strong><br>
        PhD Fellow, BUET<br>
        Senior Lecturer<br>
        Department of CSE
      </p>
    </div>
    <div style="width: 45%;">
      <h3>Submitted By</h3>
      <p>
        <strong>MD Tuhin Sheikh</strong><br>
        ID: 222-15-6288<br>
        Section: 62 F1<br>
        B.Sc. in CSE
      </p>
    </div>A
  </div>
</div>

<br><hr><br>

## Project: Matrimonial Biodata Database CRUD

### 1. Introduction
This project involves constructing a Matrimonial Biodata database and applying CRUD (Create, Read, Update, Delete) operations using PHP and MySQL. The goal is to develop a functional web portal where users can seamlessly add, view, modify, and delete biodata records. The application features a modern, premium aesthetic with a responsive design, enhancing the user experience.

### 2. Tools & Technologies
* **Front-end:** HTML5, CSS3 (Vanilla CSS for custom premium styles and glassmorphism)
* **Back-end:** PHP (PDO for database connectivity)
* **Database:** MySQL
* **Development Environment:** XAMPP / LAMP Server setup
* **Version Control:** Git & GitHub

### 3. Methodology
The development followed a systematic approach beginning with the database design, crafting the user interface, and implementing the server-side logic for the CRUD operations. We ensured separation of concerns by placing the database connection in a separate file, and styling rules in an external stylesheet.

**GitHub Repository:**  
The complete source code and project documentation have been uploaded to GitHub. You can view the full implementation details here:  
[https://github.com/himlersheikh/matrimonial-biodata-crud](https://github.com/himlersheikh/matrimonial-biodata-crud)

### 4. Implementation Details

#### Database Schema (`database.sql`)
We created a database named `matrimonial_db` containing a `biodata` table with fields such as `full_name`, `gender`, `dob`, `religion`, `education`, `contact_phone`, and `address`.

#### Server Connection (`db.php`)
PDO (PHP Data Objects) is utilized for connecting to the MySQL database. It was chosen to provide robust security (mitigating SQL injection) and error handling capabilities.

#### Create Operation (`create.php`)
A form was developed to capture patient details. Upon submission, a POST request is sent, and data is safely inserted into the `biodata` table using prepared statements.

#### Read Operation (`index.php`)
The root file retrieves all records from the database and renders them in a formatted table. Users can view available profiles, each equipped with "Edit" and "Delete" action buttons.

#### Update Operation (`edit.php`)
Clicking the "Edit" button opens a populated form utilizing the specific ID's GET request. The updated information is submitted and synchronized with the database record.

#### Delete Operation (`delete.php`)
The application executes a DELETE query to remove a record by passing the `id` through a GET request. Action confirmation prevents accidental deletions.

### 5. Conclusion
Through this project, we successfully mastered the concepts of back-end integration with a relational database. Connecting PHP to MySQL and executing secure CRUD statements is an essential prerequisite to building robust, data-driven web applications. This matrimonial biodata application functions accurately and presents the user interface in a visually pleasing manner.
