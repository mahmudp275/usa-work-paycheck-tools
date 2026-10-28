<?php
/**
 * Plugin Name: USA Paycheck & Work Tools
 * Description: Four responsive paycheck and work calculators with SEO-friendly content. Use shortcode [usa_work_tools].
 * Version: 1.0.0
 * Author: Site Owner
 * License: GPL-2.0-or-later
 */

if (!defined('ABSPATH')) exit;

function usawt_shortcode() {
    ob_start();
    ?>
    <div class="usawt-wrap">
      <header class="usawt-hero">
        <div class="usawt-eyebrow">FREE WORK & PAY TOOLS</div>
        <h1>USA Paycheck & Work Calculators</h1>
        <p class="usawt-lead">Estimate your annual salary, overtime pay, paycheck after your own withholding estimate, and total work hours. Simple tools for employees, hourly workers, and freelancers in the United States.</p>
        <div class="usawt-trust">Fast • Mobile-friendly • No account required</div>
      </header>

      <nav class="usawt-tabs" aria-label="Calculator tools">
        <button class="usawt-tab is-active" data-target="usawt-salary">Hourly to Salary</button>
        <button class="usawt-tab" data-target="usawt-overtime">Overtime Pay</button>
        <button class="usawt-tab" data-target="usawt-paycheck">Paycheck Estimator</button>
        <button class="usawt-tab" data-target="usawt-hours">Work Hours</button>
      </nav>

      <section class="usawt-panel is-active" id="usawt-salary">
        <div class="usawt-panel-head"><span class="usawt-number">01</span><div><h2>Hourly to Yearly Salary Calculator</h2><p>Convert an hourly wage into weekly, monthly, and annual gross pay.</p></div></div>
        <div class="usawt-grid">
          <label>Hourly wage ($)<input type="number" min="0" step="0.01" id="usawt-wage" value="25"></label>
          <label>Hours per week<input type="number" min="0" max="168" step="0.25" id="usawt-weekhours" value="40"></label>
          <label>Weeks worked per year<input type="number" min="0" max="52" step="1" id="usawt-weeks" value="52"></label>
          <div class="usawt-action"><button class="usawt-primary" id="usawt-salary-btn">Calculate salary</button></div>
        </div>
        <div class="usawt-results" id="usawt-salary-result" aria-live="polite"></div>
        <p class="usawt-note">Results are gross earnings before taxes, insurance, retirement contributions, or other deductions.</p>
      </section>

      <section class="usawt-panel" id="usawt-overtime">
        <div class="usawt-panel-head"><span class="usawt-number">02</span><div><h2>Overtime Pay Calculator</h2><p>Estimate regular pay and overtime pay using the overtime multiplier you enter.</p></div></div>
        <div class="usawt-grid">
          <label>Hourly wage ($)<input type="number" min="0" step="0.01" id="usawt-ot-wage" value="20"></label>
          <label>Total hours worked<input type="number" min="0" max="168" step="0.25" id="usawt-ot-hours" value="46"></label>
          <label>Regular hours before overtime<input type="number" min="0" max="168" step="0.25" id="usawt-ot-threshold" value="40"></label>
          <label>Overtime multiplier<input type="number" min="1" max="3" step="0.1" id="usawt-ot-multiplier" value="1.5"></label>
          <div class="usawt-action"><button class="usawt-primary" id="usawt-ot-btn">Calculate overtime</button></div>
        </div>
        <div class="usawt-results" id="usawt-ot-result" aria-live="polite"></div>
        <p class="usawt-note">This is a planning estimate, not a legal determination of overtime eligibility. Federal and state rules, exemptions, and workweek definitions may affect actual pay. Check official guidance for your situation.</p>
      </section>

      <section class="usawt-panel" id="usawt-paycheck">
        <div class="usawt-panel-head"><span class="usawt-number">03</span><div><h2>Paycheck Take-Home Estimator</h2><p>Estimate take-home pay using your gross pay and an optional combined withholding percentage.</p></div></div>
        <div class="usawt-grid">
          <label>Gross pay for this paycheck ($)<input type="number" min="0" step="0.01" id="usawt-gross" value="2000"></label>
          <label>Pay frequency<select id="usawt-frequency"><option value="weekly">Weekly</option><option value="biweekly" selected>Every 2 weeks (biweekly)</option><option value="semimonthly">Twice a month (semimonthly)</option><option value="monthly">Monthly</option></select></label>
          <label>Estimated total withholding (%)<input type="number" min="0" max="100" step="0.1" id="usawt-tax" value="20"></label>
          <label>State (optional)<select id="usawt-state"><option value="">Select a state</option><option>Alabama</option><option>Alaska</option><option>Arizona</option><option>Arkansas</option><option>California</option><option>Colorado</option><option>Connecticut</option><option>Delaware</option><option>Florida</option><option>Georgia</option><option>Hawaii</option><option>Idaho</option><option>Illinois</option><option>Indiana</option><option>Iowa</option><option>Kansas</option><option>Kentucky</option><option>Louisiana</option><option>Maine</option><option>Maryland</option><option>Massachusetts</option><option>Michigan</option><option>Minnesota</option><option>Mississippi</option><option>Missouri</option><option>Montana</option><option>Nebraska</option><option>Nevada</option><option>New Hampshire</option><option>New Jersey</option><option>New Mexico</option><option>New York</option><option>North Carolina</option><option>North Dakota</option><option>Ohio</option><option>Oklahoma</option><option>Oregon</option><option>Pennsylvania</option><option>Rhode Island</option><option>South Carolina</option><option>South Dakota</option><option>Tennessee</option><option>Texas</option><option>Utah</option><option>Vermont</option><option>Virginia</option><option>Washington</option><option>West Virginia</option><option>Wisconsin</option><option>Wyoming</option><option>District of Columbia</option></select></label>
          <div class="usawt-action"><button class="usawt-primary" id="usawt-paycheck-btn">Estimate paycheck</button></div>
        </div>
        <div class="usawt-results" id="usawt-paycheck-result" aria-live="polite"></div>
        <p class="usawt-note">The state field is for your own reference only; this version does not calculate state-specific taxes. Enter a realistic combined withholding estimate based on your pay stub or a trusted tax calculator. This is not tax advice.</p>
      </section>

      <section class="usawt-panel" id="usawt-hours">
        <div class="usawt-panel-head"><span class="usawt-number">04</span><div><h2>Work Hours & Break Calculator</h2><p>Calculate paid hours from your start time, end time, and unpaid break.</p></div></div>
        <div class="usawt-grid">
          <label>Start time<input type="time" id="usawt-start" value="09:00"></label>
          <label>End time<input type="time" id="usawt-end" value="17:30"></label>
          <label>Unpaid break (minutes)<input type="number" min="0" max="1440" step="1" id="usawt-break" value="30"></label>
          <label>Hourly wage ($, optional)<input type="number" min="0" step="0.01" id="usawt-hours-wage" value="20"></label>
          <div class="usawt-action"><button class="usawt-primary" id="usawt-hours-btn">Calculate work hours</button></div>
        </div>
        <div class="usawt-results" id="usawt-hours-result" aria-live="polite"></div>
        <p class="usawt-note">For shifts that end after midnight, enter the next-day end time. Break and work-time rules vary by state and employer.</p>
      </section>

      <section class="usawt-seo">
        <h2>How to Use These Paycheck and Work Calculators</h2>
        <p>Use the hourly-to-salary calculator to compare an hourly wage with weekly, monthly, and yearly gross earnings. Enter your usual hours and the number of weeks you expect to work. Paid time off, unpaid leave, bonuses, and changes in hours can affect actual annual income.</p>
        <h3>How is overtime pay estimated?</h3>
        <p>Enter your hourly rate, total hours worked during the workweek, regular-hour threshold, and overtime multiplier. The calculator separates regular earnings from overtime earnings. Many covered, nonexempt employees are entitled to at least one and one-half times their regular rate for hours worked over 40 in a workweek under federal law, but eligibility and state rules can differ. Confirm the rules that apply to your job.</p>
        <h3>How can I estimate take-home pay?</h3>
        <p>Take-home pay is the amount remaining after taxes and other payroll deductions. This estimator lets you enter a combined withholding percentage to get a rough planning figure. Actual withholding depends on factors such as filing status, income, W-4 elections, state and local taxes, benefits, and retirement contributions. For a more accurate estimate, use official tax resources and your payroll information.</p>
        <h3>How do I calculate paid work hours?</h3>
        <p>Enter the shift start and end times and subtract any unpaid break. The result shows paid hours and, if you enter an hourly wage, estimated gross pay for that shift. For overnight shifts, the end time is treated as the following day when it is earlier than the start time.</p>
        <h3>Frequently Asked Questions</h3>
        <details><summary>How much is $25 an hour per year?</summary><p>At 40 hours per week for 52 weeks, $25 per hour equals $52,000 in annual gross pay before deductions.</p></details>
        <details><summary>Does this tool calculate exact taxes for every state?</summary><p>No. The paycheck estimator uses a percentage you provide. It does not apply federal, state, or local tax brackets or calculate individual deductions.</p></details>
        <details><summary>Is overtime always paid at 1.5 times the hourly rate?</summary><p>Not in every situation. Federal coverage, employee classification, the regular rate, state law, and other rules can affect overtime. Use official government guidance for legal questions.</p></details>
        <details><summary>Is the calculator free?</summary><p>Yes. The tools on this page are free to use and do not require an account.</p></details>
        <p class="usawt-disclaimer"><strong>Disclaimer:</strong> These calculators provide general estimates for planning and educational purposes only. They do not provide tax, payroll, or legal advice. Results may not reflect every federal, state, or local rule. Verify important calculations with official sources or a qualified professional.</p>
      </section>
      <footer class="usawt-footer">Free USA work calculators • Estimates only • Check official sources for tax and employment rules.</footer>
    </div>
    <style>
      .usawt-wrap{--navy:#10243f;--blue:#2457d6;--ink:#182230;--muted:#627084;--line:#e2e8f0;max-width:1080px;margin:28px auto;padding:0 16px;color:var(--ink);font-family:Inter,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;line-height:1.6}
      .usawt-wrap *{box-sizing:border-box}.usawt-hero{padding:42px 36px;border-radius:24px;background:linear-gradient(130deg,#10243f,#1b4775);color:#fff}
      .usawt-eyebrow{font-size:12px;letter-spacing:2px;font-weight:800;color:#b9d2ff}.usawt-hero h1{font-size:clamp(30px,4vw,46px);line-height:1.12;letter-spacing:-1.2px;margin:12px 0;color:#fff}.usawt-lead{max-width:760px;color:#e0e9f7;font-size:17px;margin:0}.usawt-trust{margin-top:18px;font-size:13px;color:#c9daf6}
      .usawt-tabs{display:flex;gap:8px;flex-wrap:wrap;margin:22px 0}.usawt-tab{border:1px solid var(--line);background:#fff;color:#304157;border-radius:999px;padding:11px 16px;font-weight:700;cursor:pointer}.usawt-tab.is-active{background:var(--blue);border-color:var(--blue);color:#fff}
      .usawt-panel{display:none;border:1px solid var(--line);border-radius:20px;padding:26px;margin:0 0 22px;box-shadow:0 8px 28px rgba(15,35,65,.05)}.usawt-panel.is-active{display:block}.usawt-panel-head{display:flex;gap:14px;align-items:flex-start;margin-bottom:22px}.usawt-number{display:grid;place-items:center;flex:0 0 42px;height:42px;border-radius:13px;background:#eaf0ff;color:var(--blue);font-weight:900}.usawt-panel h2{margin:0;color:var(--navy);font-size:24px;line-height:1.25}.usawt-panel-head p{margin:6px 0 0;color:var(--muted)}
      .usawt-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}.usawt-grid label{font-size:14px;font-weight:700;color:#344256;display:flex;flex-direction:column;gap:7px}.usawt-grid input,.usawt-grid select{width:100%;min-height:46px;border:1px solid #cfd8e5;border-radius:10px;padding:10px 12px;font:inherit;color:#16243a;background:#fff}.usawt-grid input:focus,.usawt-grid select:focus{outline:3px solid #dbe7ff;border-color:#5079df}.usawt-action{display:flex;align-items:end}.usawt-primary{background:var(--blue);border:0;border-radius:10px;padding:13px 20px;color:#fff;font-weight:800;cursor:pointer;min-height:46px}.usawt-primary:hover{background:#1746bb}
      .usawt-results{margin-top:22px;display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px}.usawt-result{padding:16px;border:1px solid var(--line);border-radius:14px;background:#f8faff}.usawt-result span{display:block;color:var(--muted);font-size:12px;font-weight:700}.usawt-result strong{display:block;color:var(--navy);font-size:23px;line-height:1.3;margin-top:5px;overflow-wrap:anywhere}.usawt-result.primary-result{background:#edf3ff;border-color:#cbd9ff}.usawt-note{font-size:12px;color:var(--muted);margin:16px 0 0}
      .usawt-seo{margin-top:36px;padding:28px;border:1px solid var(--line);border-radius:20px}.usawt-seo h2{font-size:28px;line-height:1.2;color:var(--navy);margin:0 0 12px}.usawt-seo h3{font-size:20px;color:var(--navy);margin:25px 0 8px}.usawt-seo p{color:#46556a}.usawt-seo details{padding:14px 0;border-bottom:1px solid var(--line)}.usawt-seo summary{font-weight:750;cursor:pointer;color:#20334d}.usawt-disclaimer{background:#fff8e8;border:1px solid #f5dfab;border-radius:12px;padding:14px;margin-top:22px}.usawt-footer{text-align:center;padding:24px 8px;color:var(--muted);font-size:12px}
      @media(max-width:650px){.usawt-hero{padding:30px 22px;border-radius:18px}.usawt-panel{padding:20px 16px}.usawt-grid{grid-template-columns:1fr}.usawt-results{grid-template-columns:1fr}.usawt-panel h2{font-size:21px}.usawt-seo{padding:20px 16px}.usawt-tab{font-size:13px;padding:9px 12px}}
    </style>
    <script>
    (function(){
      const root = document.currentScript ? document.currentScript.previousElementSibling : null;
      // Scope to the closest calculator wrapper so multiple shortcode instances can coexist.
      const script = document.currentScript;
      let wrap = script;
      while (wrap && !(wrap.classList && wrap.classList.contains('usawt-wrap'))) wrap = wrap.previousElementSibling;
      if (!wrap) wrap = document.querySelector('.usawt-wrap:last-of-type');
      if (!wrap || wrap.dataset.usawtReady === '1') return;
      wrap.dataset.usawtReady = '1';
      const $ = id => wrap.querySelector('#' + id);
      const money = n => new Intl.NumberFormat('en-US',{style:'currency',currency:'USD',maximumFractionDigits:2}).format(Number.isFinite(n)?n:0);
      const num = id => { const v = parseFloat($(id).value); return Number.isFinite(v) ? v : 0; };
      const safe = n => Math.max(0,n);
      function cards(target,items){ $(target).innerHTML=items.map((it,i)=>'<div class="usawt-result '+(i===0?'primary-result':'')+'"><span>'+it[0]+'</span><strong>'+it[1]+'</strong></div>').join(''); }
      wrap.querySelectorAll('.usawt-tab').forEach(btn=>btn.addEventListener('click',()=>{
        wrap.querySelectorAll('.usawt-tab').forEach(b=>b.classList.toggle('is-active',b===btn));
        wrap.querySelectorAll('.usawt-panel').forEach(p=>p.classList.toggle('is-active',p.id===btn.dataset.target));
      }));
      $('usawt-salary-btn').addEventListener('click',()=>{
        const wage=safe(num('usawt-wage')), hrs=Math.min(168,safe(num('usawt-weekhours'))), weeks=Math.min(52,safe(num('usawt-weeks')));
        const weekly=wage*hrs, annual=weekly*weeks;
        cards('usawt-salary-result',[['Annual gross pay',money(annual)],['Monthly average',money(annual/12)],['Weekly gross pay',money(weekly)]]);
      });
      $('usawt-ot-btn').addEventListener('click',()=>{
        const wage=safe(num('usawt-ot-wage')), total=Math.min(168,safe(num('usawt-ot-hours'))), threshold=Math.min(168,safe(num('usawt-ot-threshold'))), mult=Math.min(3,Math.max(1,num('usawt-ot-multiplier')));
        const regular=Math.min(total,threshold), ot=Math.max(0,total-threshold), regularPay=regular*wage, otPay=ot*wage*mult;
        cards('usawt-ot-result',[['Estimated gross pay',money(regularPay+otPay)],['Regular pay',money(regularPay)],['Overtime pay ('+ot.toFixed(2)+' hrs)',money(otPay)]]);
      });
      $('usawt-paycheck-btn').addEventListener('click',()=>{
        const gross=safe(num('usawt-gross')), pct=Math.min(100,safe(num('usawt-tax'))), withheld=gross*pct/100, net=gross-withheld;
        const freq=$('usawt-frequency').value, factor={weekly:52,biweekly:26,semimonthly:24,monthly:12}[freq]||26;
        const state=$('usawt-state').value;
        cards('usawt-paycheck-result',[['Estimated take-home',money(net)],['Estimated withholding',money(withheld)],['Annualized take-home',money(net*factor)]]);
        const result=$('usawt-paycheck-result');
        if(state){const note=document.createElement('p');note.className='usawt-note';note.textContent='Selected state: '+state+'. State-specific tax is not automatically calculated; your entered withholding percentage drives this estimate.';result.appendChild(note);}
      });
      $('usawt-hours-btn').addEventListener('click',()=>{
        const start=$('usawt-start').value,end=$('usawt-end').value,br=safe(num('usawt-break')),wage=safe(num('usawt-hours-wage'));
        if(!start||!end){cards('usawt-hours-result',[['Check input','Enter a start and end time'],['Paid hours','—'],['Estimated gross pay','—']]);return;}
        const parts=s=>s.split(':').map(Number);const a=parts(start),b=parts(end);
        let minsA=a[0]*60+a[1],minsB=b[0]*60+b[1];if(minsB<minsA)minsB+=1440;
        const paid=Math.max(0,minsB-minsA-br)/60;
        cards('usawt-hours-result',[['Paid work hours',paid.toFixed(2)+' hours'],['Unpaid break',br+' minutes'],['Estimated gross pay',money(paid*wage)]]);
      });
      $('usawt-salary-btn').click();$('usawt-ot-btn').click();$('usawt-paycheck-btn').click();$('usawt-hours-btn').click();
    })();
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('usa_work_tools', 'usawt_shortcode');
