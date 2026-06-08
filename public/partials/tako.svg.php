<?php
/**
 * TaKo mascot inline SVG. Mirrors the source asset tako.svg as closely
 * as possible (just renamed classes to avoid clashes), with two small
 * additions for animation:
 *   - eyes wrapped with .tako-eye class for the blink keyframe;
 *   - the belly clipboard + paper-rect + text-lines wrapped in
 *     .tako-paper-feed so the whole strip can translate as one,
 *     clipped to its own area, to simulate paper continuously feeding
 *     out from the clipboard.
 */
?>
<svg class="tako-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1017.322 1110.192" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="tk-leg-l" x1="256.304" y1="969.249" x2="492.264" y2="969.249" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#4d4743"/>
            <stop offset="1" stop-color="#262424"/>
        </linearGradient>
        <linearGradient id="tk-foot-l" x1="307.89" y1="1013.12" x2="404.067" y2="1013.12" xlink:href="#tk-leg-l"/>
        <linearGradient id="tk-leg-r" x1="761.018" y1="969.249" x2="525.058" y2="969.249" xlink:href="#tk-leg-l"/>
        <linearGradient id="tk-foot-r" x1="709.432" y1="1013.12" x2="613.256" y2="1013.12" xlink:href="#tk-leg-l"/>
        <linearGradient id="tk-display" x1="228.269" y1="459.89" x2="789.053" y2="459.89" gradientUnits="userSpaceOnUse">
            <stop offset=".002" stop-color="#151827"/>
            <stop offset=".036" stop-color="#181b2c"/>
            <stop offset=".158" stop-color="#21263b"/>
            <stop offset=".301" stop-color="#272c44"/>
            <stop offset=".522" stop-color="#292e47"/>
            <stop offset=".711" stop-color="#272b44"/>
            <stop offset=".853" stop-color="#21253a"/>
            <stop offset=".979" stop-color="#171a2a"/>
            <stop offset="1" stop-color="#151827"/>
        </linearGradient>
    </defs>
    <!-- Legs stay grounded (no wiggle), the body group on top wiggles. -->
    <g>
        <g>
            <path fill="url(#tk-leg-l)" d="M307.89,1000.458h-7.562c-25.523.772-44.024,18.966-44.024,43.377v43.234c0,10.371,8.407,18.778,18.778,18.778h198.404c10.371,0,18.778-8.407,18.778-18.778v-254.417h-184.374v167.806Z"/>
            <path fill="url(#tk-foot-l)" d="M307.89,1000.458s43.576-2.519,96.176,25.382"/>
        </g>
        <g>
            <path fill="url(#tk-leg-r)" d="M709.432,1000.458h7.562c25.523.772,44.024,18.966,44.024,43.377v43.234c0,10.371-8.407,18.778-18.778,18.778h-198.404c-10.371,0-18.778-8.407-18.778-18.778v-1.122s0-64.949,0-64.949v-188.346h184.374v167.806Z"/>
            <path fill="url(#tk-foot-r)" d="M709.432,1000.458s-43.576-2.519-96.176,25.382"/>
        </g>

        <!-- Wiggle group: body + face + antenna sway as one (Furby-style). -->
        <g class="tako-bobble">
            <!-- Antenna: separate sway, wider angle. Origin sits at the base
                 where the wire meets the body shell (~x=509, y=180). -->
            <g class="tako-antenna" style="transform-origin: 509px 200px;">
                <path fill="none" stroke="#fff" stroke-width="33.762" stroke-miterlimit="10" d="M504.288,16.881h8.746c28.704,0,52.008,23.304,52.008,52.008v111.094h-112.761v-111.094c0-28.704,23.304-52.008,52.008-52.008Z"/>
                <rect fill="#fff" x="568.34" y="-49.706" width="61.727" height="194.827" rx="30.864" ry="30.864" transform="translate(522.953 -548.536) rotate(78.16)"/>
            </g>
            <path fill="#075da9" d="M977.578,571.896c0,190.551-113.656,281.994-276.872,317.005-58.606,12.587-123.61,17.881-192.038,17.881s-133.433-5.293-192.051-17.881c-163.216-35.024-276.872-126.454-276.872-317.005,0-258.965,209.945-468.911,468.924-468.911s468.911,209.945,468.911,468.911Z"/>
            <ellipse fill="#075da9" cx="124.221" cy="723.877" rx="194.303" ry="104.31" transform="translate(-586.653 539.252) rotate(-65.704)"/>
            <ellipse fill="#075da9" cx="893.102" cy="723.877" rx="104.31" ry="194.303" transform="translate(-218.741 431.587) rotate(-24.296)"/>
        <polyline fill="#a0d7e7" stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" points="595.497 586.798 595.497 764.761 413.755 764.761 413.755 586.574"/>
        <rect fill="#a0d7e7" stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x="468.274" y="722.905" width="181.741" height="382.711"/>
        <polygon fill="none" stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" points="733.65 1105.617 551.909 1105.617 588.691 1075.977 770.431 1075.977 733.65 1105.617"/>
        <polygon fill="#a0d7e7" stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" points="618.17 1105.617 799.911 1105.617 773.801 1075.977 592.06 1075.977 618.17 1105.617"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-miterlimit="10" x1="468.274" y1="722.905" x2="413.75" y2="764.759"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="441.012" y1="663.987" x2="543.12" y2="663.987"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="441.012" y1="683.931" x2="567.853" y2="683.931"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="441.012" y1="703.875" x2="516.774" y2="703.875"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="756.464" x2="622.565" y2="756.464"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="776.408" x2="588.154" y2="776.408"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="796.353" x2="597.832" y2="796.353"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="816.297" x2="622.565" y2="816.297"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="836.241" x2="571.485" y2="836.241"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="856.186" x2="622.565" y2="856.186"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="876.13" x2="588.154" y2="876.13"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="896.074" x2="597.832" y2="896.074"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="916.019" x2="622.565" y2="916.019"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="935.963" x2="571.485" y2="935.963"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="956.109" x2="622.565" y2="956.109"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="976.054" x2="588.154" y2="976.054"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="995.998" x2="597.832" y2="995.998"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="1015.942" x2="622.565" y2="1015.942"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="1035.886" x2="571.485" y2="1035.886"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="1055.831" x2="622.565" y2="1055.831"/>
        <line stroke="#075da9" stroke-width="9.151" stroke-linecap="round" stroke-linejoin="round" x1="495.724" y1="1075.775" x2="571.485" y2="1075.775"/>
        <path fill="url(#tk-display)" d="M703.101,595.694h0c-121.47,65.032-267.409,65.032-388.88,0h0c-47.47,0-85.952-38.482-85.952-85.952v-148.478c0-47.47,38.482-85.952,85.952-85.952h388.88c47.47,0,85.952,38.482,85.952,85.952v148.478c0,47.47-38.482,85.952-85.952,85.952Z"/>
        <!-- Hands: each gets its own rotation origin near the shoulder so they
             can wave a little. -->
        <g class="tako-hand tako-hand-l" style="transform-origin: 280px 603px;">
            <ellipse fill="#1e75b8" cx="228.269" cy="603.308" rx="81.458" ry="92.959" transform="translate(-416.05 633.973) rotate(-72)"/>
        </g>
        <g class="tako-hand tako-hand-r" style="transform-origin: 740px 603px;">
            <ellipse fill="#1e75b8" cx="789.053" cy="603.308" rx="92.959" ry="81.458" transform="translate(-147.813 273.359) rotate(-18)"/>
        </g>
            <g>
                <circle class="tako-eye" fill="#fff" cx="410.093" cy="435.503" r="35.809"/>
                <circle class="tako-eye" fill="#fff" cx="607.229" cy="435.503" r="35.809"/>
            </g>
        </g>
    </g>
</svg>
