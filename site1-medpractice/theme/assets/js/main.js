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
