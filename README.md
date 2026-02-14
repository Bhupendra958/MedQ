# MedQueue

A hospital queue and appointment system — book appointments, get token numbers, and view your dashboard. Works on desktop and **mobile (phone)**.

---

## Push to GitHub

1. **Create a new repository on GitHub**
   - Go to [github.com/new](https://github.com/new)
   - Name it e.g. `MedQueue`, leave it empty (no README/license).

2. **Push from your computer** (run in project folder):

```bash
cd c:\xampp\htdocs\MedQueue
git init
git add .
git commit -m "Initial commit: MedQueue app"
git branch -M main
git remote add origin https://github.com/YOUR_USERNAME/MedQueue.git
git push -u origin main
```

Replace `YOUR_USERNAME` with your GitHub username. If it asks for login, use a **Personal Access Token** as password (GitHub → Settings → Developer settings → Personal access tokens).

---

## Make it live (open on phone)

To open the site on your phone you need a **public URL**. Use one of these:

### Option A: 000webhost (free, PHP + MySQL)

1. Go to [000webhost.com](https://www.000webhost.com) and sign up.
2. Create a new website, choose a subdomain (e.g. `medqueue.000webhostapp.com`).
3. In the **File Manager**, upload your project (or connect GitHub if they support it), or upload a ZIP of your `MedQueue` folder.
4. In the control panel, open **MySQL** and create a database. Note: host, database name, username, password.
5. Import `setup.sql` in phpMyAdmin (or their MySQL panel).
6. Edit `db.php` on the server with the **host**, **db_user**, **password**, **dbname** they gave you.
7. Open `https://yoursite.000webhostapp.com` on your phone — it will work.

### Option B: InfinityFree (free, PHP + MySQL)

1. Sign up at [infinityfree.net](https://www.infinityfree.net).
2. Create a free hosting account and get a subdomain (e.g. `yoursite.rf.gd`).
3. Use **FTP** or **File Manager** to upload your MedQueue files.
4. Create MySQL database in the panel, run `setup.sql`, then update `db.php` with the provided DB details.
5. Visit your site URL on your phone.

### Option C: Render (from GitHub; needs external MySQL)

1. Push your code to GitHub (steps above).
2. Go to [render.com](https://render.com), sign up, connect GitHub.
3. Create a **Web Service**, select your MedQueue repo.
4. Render doesn’t include MySQL; use a free DB (e.g. [PlanetScale](https://planetscale.com) or [FreeSQLDatabase](https://www.freesqldatabase.com)) and put the host/user/password/dbname in `db.php` or environment variables.
5. After deploy, use the given URL (e.g. `https://medqueue.onrender.com`) on your phone.

---

## Local run (XAMPP)

1. Put the project in `c:\xampp\htdocs\MedQueue`.
2. Start **Apache** and **MySQL** in XAMPP.
3. Create database and import: in phpMyAdmin run `setup.sql` (creates `hospital_queue` and tables).
4. Open [http://localhost/MedQueue](http://localhost/MedQueue).

---

## Mobile

Pages include a viewport meta tag so the site is responsive and opens correctly on your phone. Use the **live URL** from 000webhost, InfinityFree, or Render (not `localhost`) to open it on your phone.
