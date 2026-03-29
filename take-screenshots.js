const puppeteer = require('puppeteer');
const path = require('path');

const pages = [
  // Site 1 - MedPractice
  {
    url: 'http://med-practice-usa.local/',
    file: 'documentation/screenshots/site1-medpractice/homepage.png',
    label: 'MedPractice - Homepage'
  },
  {
    url: 'http://med-practice-usa.local/california/',
    file: 'documentation/screenshots/site1-medpractice/state-landing.png',
    label: 'MedPractice - State Landing'
  },
  {
    url: 'http://med-practice-usa.local/contact/',
    file: 'documentation/screenshots/site1-medpractice/contact.png',
    label: 'MedPractice - Contact'
  },

  // Site 2 - TechFlow
  {
    url: 'http://techflow-agency.local/',
    file: 'documentation/screenshots/site2-techflow/homepage.png',
    label: 'TechFlow - Homepage'
  },
  {
    url: 'http://techflow-agency.local/services/',
    file: 'documentation/screenshots/site2-techflow/services.png',
    label: 'TechFlow - Services'
  },
  {
    url: 'http://techflow-agency.local/work/',
    file: 'documentation/screenshots/site2-techflow/work.png',
    label: 'TechFlow - Work'
  },
  {
    url: 'http://techflow-agency.local/about/',
    file: 'documentation/screenshots/site2-techflow/about.png',
    label: 'TechFlow - About'
  },
  {
    url: 'http://techflow-agency.local/contact/',
    file: 'documentation/screenshots/site2-techflow/contact.png',
    label: 'TechFlow - Contact'
  },

  // Site 3 - FreshBite
  {
    url: 'http://freshbite-marketplace.local/',
    file: 'documentation/screenshots/site3-freshbite/homepage.png',
    label: 'FreshBite - Homepage'
  },
  {
    url: 'http://freshbite-marketplace.local/shop/',
    file: 'documentation/screenshots/site3-freshbite/shop.png',
    label: 'FreshBite - Shop'
  },
];

(async () => {
  const browser = await puppeteer.launch({
    headless: true,
    args: ['--no-sandbox']
  });

  for (const page of pages) {
    console.log(`📸 Capturing: ${page.label}`);
    const tab = await browser.newPage();

    // Desktop viewport
    await tab.setViewport({ width: 1440, height: 900 });

    try {
      await tab.goto(page.url, {
        waitUntil: 'networkidle2',
        timeout: 15000
      });

      // Wait for animations
      await tab.waitForTimeout(2000);

      await tab.screenshot({
        path: page.file,
        fullPage: true
      });

      console.log(`   ✅ Saved: ${page.file}`);
    } catch (err) {
      console.log(`   ❌ Error: ${err.message}`);
    }

    await tab.close();
  }

  await browser.close();
  console.log('\n🎉 All screenshots done!');
})();
