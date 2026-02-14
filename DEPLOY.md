# Live link: BhupendraMedqueue (any device)

Your site will be available at: **https://bhupendramedqueue.onrender.com**  
It works on desktop, phone, and tablet. When you push changes to GitHub, Render will redeploy automatically.

---

## Step 1: Free MySQL database (for live site)

1. Go to **[remotemysql.com](https://remotemysql.com)** or **[db4free.net](https://www.db4free.net/signup.php)** and create a free account.
2. Create a new database. Note down:
   - **Host** (e.g. `remotemysql.com` or `db4free.net`)
   - **Username**
   - **Password**
   - **Database name**
3. Open **phpMyAdmin** (they provide a link) and **import** the contents of `setup.sql` from this repo (creates tables `users`, `appointments`, `queue`).  
   - If the file uses `CREATE DATABASE` / `USE`, either run those in phpMyAdmin or create the database with the same name and then import the rest.

---

## Step 2: Deploy on Render (GitHub → live link)

1. Go to **[render.com](https://render.com)** and sign up / log in (use “Sign in with GitHub”).
2. Click **New +** → **Web Service**.
3. Connect the repo **Bhupendra958/MedQueue** (if not listed, click “Configure account” and allow access to the MedQueue repo).
4. Set:
   - **Name:** `bhupendramedqueue` (this gives the link **https://bhupendramedqueue.onrender.com**).
   - **Region:** choose one close to you.
   - **Branch:** `main`.
   - **Runtime:** **Docker** (Render will use the repo’s `Dockerfile`).
5. Under **Environment**, add these variables (use the values from Step 1):

   | Key               | Value              |
   |-------------------|--------------------|
   | `MYSQL_HOST`      | your DB host       |
   | `MYSQL_USERNAME`  | your DB username   |
   | `MYSQL_PASSWORD`  | your DB password   |
   | `MYSQL_DATABASE`  | your DB name       |

6. Click **Create Web Service**. Render will build and deploy. Wait until the status is **Live**.
7. Open **https://bhupendramedqueue.onrender.com** in a browser or on your phone.

---

## Step 3: Updates (change anything → still works)

Whenever you change the project and push to GitHub:

```bash
cd c:\xampp\htdocs\MedQueue
git add .
git commit -m "Your change message"
git push origin main
```

Render will detect the push and **redeploy automatically**. The same link keeps working on all platforms.

---

## Optional: Custom domain

In Render: **Dashboard** → your service **bhupendramedqueue** → **Settings** → **Custom Domains**. You can add your own domain (e.g. `bhupendramedqueue.com`) if you have one.
