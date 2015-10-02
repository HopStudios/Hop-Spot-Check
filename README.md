Hop Spot Check for Expression Engine
===============================

Check if your content is displayed only where it should be.

## Documentation

    {exp:hop_spot_check spot="" action=""}

In Spot, you put what you expect the page to be, and it compares that to what the current URL is.
By default, if there's no match, you get forwarded to the URL of the spot you specified.

* `redirect="404"`
    will redirect the user to the default 404 page

* `redirect="template_group/template/whatever"`
    will redirect the user to the redirect URL

**/!\ NEVER** leave a trailing slash (like '/the/path/') on the spot parameter, otherwise you might fall into a redirection loop (and your visitors might not appreciate that ;) )


### Examples

URL is http://ee.dev/index.php/test/hop_spot_check  
Tag is {exp:hop_spot_check spot="/test/hop_spot_check" }

Result : doing nothing


URL is http://ee.dev/index.php/test/hop_spot_check/  
Tag is {exp:hop_spot_check spot="test/hop_spot_check"}

Result : doing nothing


URL is http://ee.dev/index.php/test/hop_spot_check/foo/bar  
Tag is {exp:hop_spot_check spot="test/hop_spot_check"}

Result : redirection to http://ee.dev/index.php/test/hop_spot_check


URL is http://ee.dev/index.php/test/hop_spot_check  
Tag is {exp:hop_spot_check spot="test/hop_spot_check/foo"}

Result : redirection to http://ee.dev/index.php/test/hop_spot_check/foo

Licence
=======

Updated: Jan. 6, 2009
## Permitted Use

One license grants the right to perform one installation of the Software. Each additional installation of the Software requires an additional purchased license. For free Software, no purchase is necessary, but this license still applies.
## Restrictions

Unless you have been granted prior, written consent from Hop Studios, you may not:

- Reproduce, distribute, or transfer the Software, or portions thereof, to any third party.
- Sell, rent, lease, assign, or sublet the Software or portions thereof.
- Use the Software in violation of any U.S. or international law or regulation.

## Display of Copyright Notices

All copyright and proprietary notices and logos in the Control Panel and within the Software files must remain intact.

## Making Copies

You may make copies of the Software for back-up purposes, provided that you reproduce the Software in its original form and with all proprietary notices on the back-up copy.

## Software Modification

You may alter, modify, or extend the Software for your own use, or commission a third-party to perform modifications for you, but you may not resell, redistribute or transfer the modified or derivative version without prior written consent from Hop Studios. Components from the Software may not be extracted and used in other programs without prior written consent from Hop Studios.

## Technical Support

Technical support is available through e-mail, at sales@hopstudios.com. Hop Studios does not provide direct phone support. No representations or guarantees are made regarding the response time in which support questions are answered.

## Refunds

Hop Studios offers refunds on software within 30 days of purchase. Contact sales@hopstudios.com for assistance. This does not apply if the Software is free.

## Indemnity

You agree to indemnify and hold harmless Hop Studios for any third-party claims, actions or suits, as well as any related expenses, liabilities, damages, settlements or fees arising from your use or misuse of the Software, or a violation of any terms of this license.

## Disclaimer Of Warranty

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF QUALITY, PERFORMANCE, NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE. FURTHER, HOP STUDIOS DOES NOT WARRANT THAT THE SOFTWARE OR ANY RELATED SERVICE WILL ALWAYS BE AVAILABLE.

## Limitations Of Liability

YOU ASSUME ALL RISK ASSOCIATED WITH THE INSTALLATION AND USE OF THE SOFTWARE. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS OF THE SOFTWARE BE LIABLE FOR CLAIMS, DAMAGES OR OTHER LIABILITY ARISING FROM, OUT OF, OR IN CONNECTION WITH THE SOFTWARE. LICENSE HOLDERS ARE SOLELY RESPONSIBLE FOR DETERMINING THE APPROPRIATENESS OF USE AND ASSUME ALL RISKS ASSOCIATED WITH ITS USE, INCLUDING BUT NOT LIMITED TO THE RISKS OF PROGRAM ERRORS, DAMAGE TO EQUIPMENT, LOSS OF DATA OR SOFTWARE PROGRAMS, OR UNAVAILABILITY OR INTERRUPTION OF OPERATIONS.
