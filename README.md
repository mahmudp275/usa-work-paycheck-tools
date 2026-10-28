# USA Paycheck & Work Tools

**Free, responsive paycheck and work calculators for WordPress.**

USA Paycheck & Work Tools is a lightweight WordPress plugin that displays four interactive calculators on any page using one shortcode. It helps visitors estimate yearly earnings, overtime pay, take-home pay based on their own withholding assumption, and paid working hours.

**Version:** `1.0.0` · **Platform:** WordPress · **Built with:** PHP, HTML, CSS, JavaScript · **License:** GPL-2.0-or-later

> **Note:** These are educational planning estimates—not an official payroll, tax-filing, or employment-law calculation service.

---

## Preview

To add a real screenshot to this README after testing the plugin:

1. Take a screenshot of the published calculator page in WordPress.
2. Upload it to this repository as `screenshots/calculator-preview.png`.
3. The screenshot file can be referenced by its filename:

```markdown
screenshots/calculator-preview.png
```

You can also add screenshots of the overtime, paycheck, and work-hours tabs to the same folder.

## Features

- **Four calculators in one interface:** Switch between tools without reloading the page.
- **Hourly to Salary:** Estimate weekly, monthly-average, and annual gross earnings from an hourly wage, weekly hours, and weeks worked.
- **Overtime Pay:** Estimate regular earnings and overtime earnings using a configurable regular-hours threshold and overtime multiplier.
- **Paycheck Take-Home Estimator:** Estimate take-home pay, assumed withholding, and annualized take-home amount from gross pay and a withholding percentage entered by the visitor.
- **Work Hours & Breaks:** Calculate paid time using shift start/end times and unpaid breaks, including overnight shifts; optionally estimate gross shift earnings.
- **Responsive interface:** Designed for desktop and mobile screens.
- **Shortcode integration:** Embed the calculators in a WordPress page or post using `[usa_work_tools]`.
- **Built-in explanatory content:** Includes guidance, frequently asked questions, and estimate disclaimers.
- **No account required:** Visitors can use the calculators without signing in.

## Calculator Details

| Tool | User inputs | Results |
| --- | --- | --- |
| Hourly to Salary | Hourly wage, hours per week, weeks worked per year | Weekly gross, monthly-average gross, annual gross |
| Overtime Pay | Hourly wage, hours worked, regular-hours threshold, overtime multiplier | Regular pay, overtime pay, estimated gross pay |
| Paycheck Estimator | Gross paycheck, pay frequency, estimated withholding %, optional state | Estimated take-home, estimated withholding, annualized take-home |
| Work Hours & Breaks | Shift start, shift end, unpaid break, optional hourly wage | Paid hours, unpaid break, estimated gross shift pay |

**Important limitation:** Selecting a state does **not** calculate that state's taxes. The tool uses the visitor's entered withholding percentage; it does not apply federal, state, or local tax brackets, payroll contributions, or individual tax circumstances.

## File Structure

```text
usa-work-paycheck-tools/
├── usa-work-paycheck-tools.php    # Plugin header, shortcode, markup, CSS and JavaScript
└── README.txt                     # Installation notes and SEO suggestions

README.md                          # GitHub project documentation (this file)
```

*The current plugin embeds its styles and scripts in the main PHP file; it does not require separate CSS or JavaScript files.*

## Installation

1. Download the installable WordPress plugin ZIP.
2. Open **WordPress Dashboard → Plugins → Add New Plugin → Upload Plugin**.
3. Select the ZIP and choose **Install Now**.
4. Click **Activate Plugin**.
5. Create or open a page where the calculators should appear.
6. Insert a **Shortcode** block in Gutenberg, or a **Shortcode** widget in Elementor.
7. Paste the shortcode below and publish or update the page.

## Shortcode

```text
[usa_work_tools]
```

The plugin renders all four tools inside one tabbed layout. No additional shortcode attributes are required in version 1.0.0.

## How It Works

1. A WordPress page renders the `[usa_work_tools]` shortcode.
2. PHP outputs the calculator markup, styling, and browser-side JavaScript.
3. Visitors select a calculator tab and enter the relevant figures.
4. JavaScript computes the estimate and updates the result cards directly on the page.
5. Relevant guidance and disclaimers appear alongside the calculators.

## Suggested Page SEO

**Suggested page title:** USA Paycheck & Work Calculators | Salary, Overtime & Work Hours

**Suggested URL slug:** `usa-paycheck-work-calculators`

**Suggested meta description:** Use free USA paycheck and work calculators to estimate hourly-to-yearly salary, overtime pay, take-home pay, and paid work hours. Results are estimates only.

SEO-friendly content does not guarantee search rankings. Review the content for accuracy before publishing.

## Compatibility and Requirements

- WordPress installation capable of running standard PHP plugins.
- A published page or post with the `[usa_work_tools]` shortcode.
- Standard browser JavaScript enabled for interactive calculations.

The plugin uses standard WordPress shortcode functionality and can be embedded using the Gutenberg Shortcode block or Elementor Shortcode widget. Specific WordPress/PHP minimum-version compatibility has not yet been verified by a test matrix.

## Limitations and Disclaimer

- The plugin does **not** compute exact federal or state taxes.
- Overtime estimates depend on the entered multiplier and threshold; actual legal entitlements can differ.
- Values are for planning and education, not tax, legal, or payroll advice.
- Results should be checked against current rules and an appropriate professional where necessary.

Official reference resources: IRS · U.S. Department of Labor

## Planned Improvements

- Configurable labels and colors from a WordPress admin settings screen.
- Optional separate calculator shortcodes.
- Dedicated external CSS and JavaScript asset files.
- More detailed guidance and accessible input validation.
- Automated testing and WordPress/PHP compatibility checks.

*Planned improvements are not included in v1.0.0.*

## Author

**Mahmud** — WordPress Developer | Elementor | Gutenberg | WooCommerce | SEO

GitHub username: `mahmudp275`

## License

GPL-2.0-or-later, as declared in the plugin header. Add a corresponding `LICENSE` file to the repository for clarity.
