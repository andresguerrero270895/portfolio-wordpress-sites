/**
 * MedPractice USA — main.js
 * AJAX search, animations, search inline results
 */
(function () {
  'use strict';

  /* ============================================================
     LOCATIONS SEARCH — dropdown inline al lado del input
     ============================================================ */
  function initLocationSearch() {

    var input      = document.getElementById('mp-state-search');
    var resultsBox = document.getElementById('mp-loc-results');
    var resultList = document.getElementById('mp-loc-results-list');

    if (!input) return; /* No estamos en la página correcta */

    /* Recopilar datos de los state cards del grid */
    var stateData = [];
    var cards = document.querySelectorAll(
      '.mp-state-card, .mp-loc-card'
    );

    cards.forEach(function (card) {
      var stateName = (card.dataset.state || '').toLowerCase().trim();
      if (!stateName) return;

      var codeEl  = card.querySelector('.mp-state-card__code, .mp-loc-card__code');
      var nameEl  = card.querySelector('.mp-state-card__name, .mp-loc-card__name');
      var countEl = card.querySelector('.mp-state-card__count, .mp-loc-card__count');

      stateData.push({
        key   : stateName,
        code  : codeEl  ? codeEl.textContent.trim()  : stateName.substr(0,2).toUpperCase(),
        label : nameEl  ? nameEl.textContent.trim()  : stateName,
        count : countEl ? countEl.textContent.replace('practices','').trim() : '50+',
        href  : card.getAttribute('href') || '#',
      });
    });

    /* Si no hay datos del grid todavía, usar lista hardcoded */
    if (stateData.length === 0) {
      var fallback = [
        {key:'alabama',       code:'AL', label:'Alabama',       count:'45',  href:'#'},
        {key:'arizona',       code:'AZ', label:'Arizona',       count:'89',  href:'#'},
        {key:'california',    code:'CA', label:'California',    count:'250', href:'#'},
        {key:'colorado',      code:'CO', label:'Colorado',      count:'72',  href:'#'},
        {key:'connecticut',   code:'CT', label:'Connecticut',   count:'48',  href:'#'},
        {key:'florida',       code:'FL', label:'Florida',       count:'210', href:'#'},
        {key:'georgia',       code:'GA', label:'Georgia',       count:'120', href:'#'},
        {key:'illinois',      code:'IL', label:'Illinois',      count:'140', href:'#'},
        {key:'indiana',       code:'IN', label:'Indiana',       count:'65',  href:'#'},
        {key:'kentucky',      code:'KY', label:'Kentucky',      count:'42',  href:'#'},
        {key:'louisiana',     code:'LA', label:'Louisiana',     count:'55',  href:'#'},
        {key:'maryland',      code:'MD', label:'Maryland',      count:'78',  href:'#'},
        {key:'massachusetts', code:'MA', label:'Massachusetts', count:'95',  href:'#'},
        {key:'michigan',      code:'MI', label:'Michigan',      count:'110', href:'#'},
        {key:'minnesota',     code:'MN', label:'Minnesota',     count:'68',  href:'#'},
        {key:'missouri',      code:'MO', label:'Missouri',      count:'70',  href:'#'},
        {key:'nevada',        code:'NV', label:'Nevada',        count:'48',  href:'#'},
        {key:'new jersey',    code:'NJ', label:'New Jersey',    count:'105', href:'#'},
        {key:'new york',      code:'NY', label:'New York',      count:'230', href:'#'},
        {key:'north carolina',code:'NC', label:'North Carolina',count:'115', href:'#'},
        {key:'ohio',          code:'OH', label:'Ohio',          count:'130', href:'#'},
        {key:'oregon',        code:'OR', label:'Oregon',        count:'58',  href:'#'},
        {key:'pennsylvania',  code:'PA', label:'Pennsylvania',  count:'145', href:'#'},
        {key:'south carolina',code:'SC', label:'South Carolina',count:'52',  href:'#'},
        {key:'tennessee',     code:'TN', label:'Tennessee',     count:'88',  href:'#'},
        {key:'texas',         code:'TX', label:'Texas',         count:'320', href:'#'},
        {key:'virginia',      code:'VA', label:'Virginia',      count:'92',  href:'#'},
        {key:'washington',    code:'WA', label:'Washington',    count:'75',  href:'#'},
        {key:'wisconsin',     code:'WI', label:'Wisconsin',     count:'38',  href:'#'},
      ];
      stateData = fallback;
    }

    /* Actualizar hrefs desde los cards reales */
    cards.forEach(function(card){
      var name = (card.dataset.state||'').toLowerCase().trim();
      var href = card.getAttribute('href')||'#';
      stateData.forEach(function(s){
        if(s.key === name && href !== '#') s.href = href;
      });
    });

    /* ── Render resultados ── */
    function showResults(q) {
      if (!resultsBox || !resultList) return;

      if (!q || q.length < 1) {
        resultsBox.classList.remove('is-visible');
        resultList.innerHTML = '';
        return;
      }

      var matches = stateData.filter(function (s) {
        return s.key.includes(q) ||
               s.label.toLowerCase().includes(q) ||
               s.code.toLowerCase().startsWith(q);
      });

      resultList.innerHTML = '';
      resultsBox.classList.add('is-visible');

      if (matches.length === 0) {
        resultList.innerHTML =
          '<div class="mp-loc-results__empty">No results for "<strong>' + q + '</strong>"</div>';
        return;
      }

      matches.forEach(function (s) {
        var a = document.createElement('a');
        a.href      = s.href;
        a.className = 'mp-loc-results__item';
        a.innerHTML =
          '<div class="mp-loc-results__code">' + s.code + '</div>' +
          '<div class="mp-loc-results__info">' +
            '<span class="mp-loc-results__name">' + s.label + '</span>' +
            '<span class="mp-loc-results__count">' + s.count + ' practices</span>' +
          '</div>' +
          '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left:auto;opacity:.4"><path d="M9 18l6-6-6-6"/></svg>';
        resultList.appendChild(a);
      });
    }

    /* Eventos */
    input.addEventListener('input', function () {
      showResults(this.value.toLowerCase().trim());
    });

    input.addEventListener('focus', function () {
      if (this.value.trim()) {
        showResults(this.value.toLowerCase().trim());
      }
    });

    input.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        if (resultsBox) resultsBox.classList.remove('is-visible');
        this.value = '';
        this.blur();
      }
      if (e.key === 'Enter') {
        var first = resultList && resultList.querySelector('.mp-loc-results__item');
        if (first) window.location.href = first.href;
      }
    });

    document.addEventListener('click', function (e) {
      if (!resultsBox) return;
      var wrap = document.querySelector('.mp-loc-search-wrap');
      if (wrap && !wrap.contains(e.target)) {
        resultsBox.classList.remove('is-visible');
      }
    });
  }

  /* ============================================================
     ANIMATIONS — fade in on scroll
     ============================================================ */
  function initAnimations() {
    if (!('IntersectionObserver' in window)) {
      document.querySelectorAll('.mp-fade-in, .mp-scale-in')
        .forEach(function(el){ el.classList.add('is-visible'); });
      return;
    }
    var io = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if(e.isIntersecting) {
          e.target.classList.add('is-visible');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('.mp-fade-in, .mp-scale-in')
      .forEach(function(el){ io.observe(el); });
  }

  /* ============================================================
     COUNTER — números animados
     ============================================================ */
  function initCounters() {
    var counters = document.querySelectorAll('.mp-counter');
    if (!counters.length) return;

    var io = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if(!e.isIntersecting) return;
        var el  = e.target;
        var end = parseInt(el.dataset.count, 10);
        var dur = 1500;
        var start = performance.now();
        function step(now) {
          var p = Math.min((now - start) / dur, 1);
          el.textContent = Math.floor(p * end).toLocaleString();
          if (p < 1) requestAnimationFrame(step);
          else el.textContent = end.toLocaleString();
        }
        requestAnimationFrame(step);
        io.unobserve(el);
      });
    }, { threshold: 0.5 });

    counters.forEach(function(c){ io.observe(c); });
  }

  /* ── INIT ── */
  document.addEventListener('DOMContentLoaded', function () {
    initLocationSearch();
    initAnimations();
    initCounters();
  });

})();

/* ============================================================
   CHAT POPUP — Bottom Right Corner
   ============================================================ */
(function() {
  'use strict';

  // Inject HTML
  const chatHTML = `
    <div id="mp-chat-popup" class="mp-chat-popup">

      <button class="mp-chat-trigger" id="mpChatTrigger" aria-label="Open chat">
        <span class="mp-chat-trigger__icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="white">
            <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H5.17L4 17.17V4h16v12z"/>
          </svg>
        </span>
        <span class="mp-chat-trigger__close">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
          </svg>
        </span>
      </button>

      <div class="mp-chat-card" id="mpChatCard">

        <div class="mp-chat-header">
          <div class="mp-chat-header__avatar">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="white">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
          </div>
          <div class="mp-chat-header__info">
            <span class="mp-chat-header__name">MedPractice USA</span>
            <span class="mp-chat-header__status">
              <span class="mp-chat-status-dot"></span>
              We're Online!
            </span>
          </div>
        </div>

        <div class="mp-chat-messages" id="mpChatMessages">
          <div class="mp-chat-msg mp-chat-msg--bot">
            <div class="mp-chat-msg__bubble">
              👋 Hi there! How can we help you today?
            </div>
          </div>
          <div class="mp-chat-msg mp-chat-msg--bot">
            <div class="mp-chat-msg__bubble">
              We specialize in <strong>medical practice sales</strong> across the USA. Choose an option below or type your question.
            </div>
          </div>
        </div>

        <div class="mp-chat-options" id="mpChatOptions">
          <button class="mp-chat-option" data-action="valuation">
            💰 Get a Free Valuation
          </button>
          <button class="mp-chat-option" data-action="consultation">
            📅 Schedule Consultation
          </button>
          <button class="mp-chat-option" data-action="listings">
            🏥 Browse Listings
          </button>
          <button class="mp-chat-option" data-action="contact">
            ✉️ Contact Us
          </button>
        </div>

        <div class="mp-chat-input-wrap">
          <input
            type="text"
            class="mp-chat-input"
            id="mpChatInput"
            placeholder="Type a message..."
            autocomplete="off"
          />
          <button class="mp-chat-send" id="mpChatSend" aria-label="Send">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#1a6db5">
              <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
            </svg>
          </button>
        </div>

      </div>

      <span class="mp-chat-badge" id="mpChatBadge">1</span>
    </div>
  `;

  document.body.insertAdjacentHTML('beforeend', chatHTML);

  // Elements
  const trigger  = document.getElementById('mpChatTrigger');
  const card     = document.getElementById('mpChatCard');
  const badge    = document.getElementById('mpChatBadge');
  const input    = document.getElementById('mpChatInput');
  const sendBtn  = document.getElementById('mpChatSend');
  const messages = document.getElementById('mpChatMessages');
  const options  = document.getElementById('mpChatOptions');

  let isOpen = false;

  // Bot responses
  const botResponses = {
    valuation: [
      "Great! We offer <strong>free practice valuations</strong> with no obligation.",
      "Our experts analyze patient volume, revenue, location and market data.",
      "Please fill out our contact form and we will get back to you within 24 hours! 📋"
    ],
    consultation: [
      "We'd love to schedule a <strong>free consultation</strong> with you!",
      "Our brokers are available Monday–Friday 9am–6pm EST.",
      "Please leave your name and phone number and we'll call you back shortly! 📞"
    ],
    listings: [
      "We have <strong>medical practices available</strong> across 30+ states!",
      "Specialties include: Primary Care, Dental, Pediatrics, Dermatology and more.",
      "Browse our current listings or tell us what specialty you're looking for! 🏥"
    ],
    contact: [
      "You can reach us at <strong>info@medpracticeusa.com</strong>",
      "Or call us at <strong>1-800-MED-SALE</strong> Monday–Friday 9am–6pm EST.",
      "We typically respond within <strong>2 business hours</strong>! ✅"
    ],
    default: [
      "Thanks for your message! 😊",
      "One of our specialists will review your inquiry and get back to you shortly.",
      "In the meantime, feel free to browse our listings or call us directly! 🏥"
    ]
  };

  // Toggle chat open/close
  function toggleChat() {
    isOpen = !isOpen;
    card.classList.toggle('mp-chat-card--open', isOpen);
    trigger.classList.toggle('mp-chat-trigger--open', isOpen);
    badge.style.display = 'none';
    if (isOpen) setTimeout(function() { input.focus(); }, 300);
  }

  trigger.addEventListener('click', toggleChat);

  // Add message to chat
  function addMessage(text, type) {
    var div = document.createElement('div');
    div.className = 'mp-chat-msg mp-chat-msg--' + type;
    div.innerHTML = '<div class="mp-chat-msg__bubble">' + text + '</div>';
    messages.appendChild(div);
    messages.scrollTop = messages.scrollHeight;
  }

  // Bot typing animation then reply
  function botReply(responses) {
    var delay = 600;
    responses.forEach(function(text) {
      setTimeout(function() {
        // Show typing indicator
        var typing = document.createElement('div');
        typing.className = 'mp-chat-msg mp-chat-msg--bot mp-chat-msg--typing';
        typing.innerHTML = '<div class="mp-chat-msg__bubble"><span></span><span></span><span></span></div>';
        messages.appendChild(typing);
        messages.scrollTop = messages.scrollHeight;

        // Replace typing with real message
        setTimeout(function() {
          typing.remove();
          addMessage(text, 'bot');
        }, 800);
      }, delay);
      delay += 1600;
    });
  }

  // Handle quick option buttons
  options.addEventListener('click', function(e) {
    var btn = e.target.closest('.mp-chat-option');
    if (!btn) return;

    var action = btn.dataset.action;
    var labels = {
      valuation:    '💰 Get a Free Valuation',
      consultation: '📅 Schedule Consultation',
      listings:     '🏥 Browse Listings',
      contact:      '✉️ Contact Us'
    };

    // Add user message
    addMessage(labels[action] || action, 'user');

    // Hide options after selection
    options.style.display = 'none';

    // Bot replies
    botReply(botResponses[action] || botResponses.default);
  });

  // Handle text input
  function sendMessage() {
    var msg = input.value.trim();
    if (!msg) return;

    addMessage(msg, 'user');
    input.value = '';
    options.style.display = 'none';

    // Simple keyword detection
    var lower = msg.toLowerCase();
    var response = botResponses.default;

    if (lower.includes('valuat') || lower.includes('price') || lower.includes('worth')) {
      response = botResponses.valuation;
    } else if (lower.includes('consult') || lower.includes('call') || lower.includes('talk')) {
      response = botResponses.consultation;
    } else if (lower.includes('list') || lower.includes('browse') || lower.includes('buy') || lower.includes('practice')) {
      response = botResponses.listings;
    } else if (lower.includes('contact') || lower.includes('email') || lower.includes('phone')) {
      response = botResponses.contact;
    }

    botReply(response);
  }

  sendBtn.addEventListener('click', sendMessage);
  input.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') sendMessage();
  });

  // Show badge after 3 seconds
  setTimeout(function() {
    if (!isOpen) {
      badge.style.display = 'flex';
      trigger.classList.add('mp-chat-trigger--pulse');
    }
  }, 3000);

})();
