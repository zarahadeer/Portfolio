# Zara Razzaq — Portfolio

My personal portfolio website, built to showcase my web development skills and projects while looking for an internship. Designed with a custom black and moon-silver theme.

## Features

- **Responsive navbar** with smooth scrolling and active-section highlighting
- **Hero section** with a "View my work" button and a "Say hello" popover linking directly to email and WhatsApp
- **About section** listing my tech stack, grouped by frontend, backend, and tools I'm currently learning
- **Services section** outlining what I can help with
- **Work section** showcasing real projects with screenshots, tags, and links to their GitHub repositories
- **Contact section** with direct links to email, WhatsApp, GitHub, and LinkedIn, plus a working contact form
- **Contact form backend** (`contact.php`) that emails submissions directly to my inbox, with input validation and spam protection
- Fully responsive — works across desktop, tablet, and mobile
- Scroll-triggered animations for a smoother browsing experience

## Tech Stack

- HTML5
- CSS3 (custom properties, Grid, Flexbox)
- JavaScript (Vanilla)
- PHP (contact form backend)

## Project Structure

```
portfolio/
├── index.html               # Main site
├── contact.php               # Contact form backend (requires PHP hosting)
├── brew-and-page.png         # Project screenshot
├── student-registration.png  # Project screenshot
└── README.md
```

## How to Run

1. Clone this repository
   ```bash
   git clone https://github.com/zarahadeer/portfolio.git
   ```
2. Open `index.html` in your browser to view the site

**Note:** The contact form requires a PHP-enabled server to work (it won't function if you just open `index.html` directly, or on static hosts like GitHub Pages). To test it locally with PHP installed, run:
```bash
php -S localhost:8000
```
then visit `http://localhost:8000` in your browser.

## Sections

| Section | Description |
|---|---|
| Home | Hero intro with call-to-action buttons |
| About | Bio and tech stack |
| Services | What I can help with |
| Work | Featured projects |
| Contact | Contact form and direct links |

## What I Learned

Building this portfolio helped me practice:
- Designing a cohesive visual theme from scratch (color system, typography, spacing)
- Writing a PHP backend to handle and validate form submissions
- Using JavaScript for scroll-based interactions (active nav links, reveal animations, popovers)
- Structuring a multi-section responsive layout with CSS Grid and Flexbox

## Contact

- **Email:** zarahadeer53@gmail.com
- **GitHub:** [github.com/zarahadeer](https://github.com/zarahadeer)
- **LinkedIn:** [linkedin.com/in/zara-hadeer/](https://www.linkedin.com/in/zara-hadeer/)

## Author

**Zara Razzaq**
Web Developer — Intermediate Student, looking for an internship.