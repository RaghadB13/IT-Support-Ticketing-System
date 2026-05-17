# IT-Support-Ticketing-System
A web-based HelpDesk platform designed to streamline technical support requests within an organization. The system provides an interactive, user-friendly interface that allows users to log technical issues, categorize them (e.g., Hardware, Printers, Network), and submit them directly to the IT department for efficient tracking and resolution.

# System Architecture & Features

Dynamic Issue Categorization: An intuitive visual selection grid (Computer, Printer, Network, etc.) to ensure accurate request routing.

Automated Data Processing: Structured backend logic to handle user details, department allocation, and issue descriptions securely.

Relational Database Storage: Secure management of support tickets to allow seamless tracking, status management, and administration.

# Tech Stack

Backend: PHP for server-side processing, form handling, and relational database communication.

Database: MySQL for robust, persistent data storage and relational ticket management.

Frontend: Semantic HTML5 and Custom CSS3 for a clean, responsive, and framework-free user interface.

Data Interchange: JSON used for structured data logging and backup tracking.

Environment: Developed and tested locally using the XAMPP stack ecosystem.

# Repository Structure

index.html / form.html: The interactive frontend layout showcasing form components, metadata inputs, and responsive grid selections.

submit.php: The backend script managing initial database connections (mysqli), data sanitation, and secure insertion of tickets.

update_status.php: Server-side script dedicated to administrative actions, allowing updates to ticket processing statuses.

tech_support.sql: The comprehensive database schema containing tables designed to store, relate, and organize submitted tickets.

requests_data.json: Structured log storage acting as a local file-based data backup for tracking request payloads.

r.html / r.php: Diagnostic and auxiliary render views used during development for data inspection and reporting layouts.
video.mp4: A walkthrough demonstration video showcasing the user interface, form submission, and system functionality.
