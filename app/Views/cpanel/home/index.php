<?php $user = $_SESSION['user'];
 ?>
<section id="dashboard-analytics">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card bg-analytics text-white">
                <div class="card-content">
                    <div class="card-body text-center">
                        <img src="../../../app-assets/images/elements/decore-left.png" class="img-left" alt="
            card-img-left">
                        <img src="../../../app-assets/images/elements/decore-right.png" class="img-right" alt="
            card-img-right">
                        <div class="avatar avatar-xl bg-primary shadow mt-0">
                            <div class="avatar-content">
                                <i class="feather icon-award white font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-2 text-white">Hi Ohio <?= $user['fullname'] ?>,</h1>
                            <p class="m-auto w-75">Have a nice day :)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-users text-primary font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mb-25">92.6k</h2>
                    <p class="mb-0">Subscribers Gained</p>
                </div>
                <div class="card-content" style="position: relative;">
                    <div id="subscribe-gain-chart" style="min-height: 100px;">
                        <div id="apexchartsm350p5ts" class="apexcharts-canvas apexchartsm350p5ts light"
                             style="width: 278px; height: 100px;">
                            <svg id="SvgjsSvg1006" width="278" height="100" xmlns="http://www.w3.org/2000/svg"
                                 version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                 transform="translate(0, 0)" style="background: transparent;">
                                <g id="SvgjsG1008" class="apexcharts-inner apexcharts-graphical"
                                   transform="translate(0, 0)">
                                    <defs id="SvgjsDefs1007">
                                        <clipPath id="gridRectMaskm350p5ts">
                                            <rect id="SvgjsRect1012" width="280.5" height="102.5" x="-1.25" y="-1.25"
                                                  rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0"
                                                  stroke="none" stroke-dasharray="0"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMaskm350p5ts">
                                            <rect id="SvgjsRect1013" width="280" height="102" x="-1" y="-1" rx="0"
                                                  ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0"></rect>
                                        </clipPath>
                                        <linearGradient id="SvgjsLinearGradient1019" x1="0" y1="0" x2="0" y2="1">
                                            <stop id="SvgjsStop1020" stop-opacity="0.7"
                                                  stop-color="rgba(115,103,240,0.7)" offset="0"></stop>
                                            <stop id="SvgjsStop1021" stop-opacity="0.5"
                                                  stop-color="rgba(241,240,254,0.5)" offset="0.8"></stop>
                                            <stop id="SvgjsStop1022" stop-opacity="0.5"
                                                  stop-color="rgba(241,240,254,0.5)" offset="1"></stop>
                                        </linearGradient>
                                    </defs>
                                    <line id="SvgjsLine1011" x1="0" y1="0" x2="0" y2="100" stroke="#b6b6b6"
                                          stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1"
                                          height="100" fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                          stroke-width="1"></line>
                                    <g id="SvgjsG1025" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1026" class="apexcharts-xaxis-texts-g"
                                           transform="translate(0, -4)"></g>
                                    </g>
                                    <g id="SvgjsG1029" class="apexcharts-grid">
                                        <line id="SvgjsLine1031" x1="0" y1="100" x2="278" y2="100" stroke="transparent"
                                              stroke-dasharray="0"></line>
                                        <line id="SvgjsLine1030" x1="0" y1="1" x2="0" y2="100" stroke="transparent"
                                              stroke-dasharray="0"></line>
                                    </g>
                                    <g id="SvgjsG1015" class="apexcharts-area-series apexcharts-plot-series">
                                        <g id="SvgjsG1016" class="apexcharts-series" seriesName="Subscribers"
                                           data:longestSeries="true" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath1023"
                                                  d="M0 100L0 77.77777777777777C16.216666666666665 77.77777777777777 30.116666666666664 51.111111111111114 46.33333333333333 51.111111111111114C62.55 51.111111111111114 76.44999999999999 60 92.66666666666666 60C108.88333333333333 60 122.78333333333333 24.444444444444443 139 24.444444444444443C155.21666666666667 24.444444444444443 169.11666666666665 55.55555555555556 185.33333333333331 55.55555555555556C201.54999999999998 55.55555555555556 215.45 6.666666666666657 231.66666666666666 6.666666666666657C247.88333333333333 6.666666666666657 261.7833333333333 17.777777777777786 278 17.777777777777786C278 17.777777777777786 278 17.777777777777786 278 100M278 17.777777777777786C278 17.777777777777786 278 17.777777777777786 278 17.777777777777786 "
                                                  fill="url(#SvgjsLinearGradient1019)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-area" index="0"
                                                  clip-path="url(#gridRectMaskm350p5ts)"
                                                  pathTo="M 0 100L 0 77.77777777777777C 16.216666666666665 77.77777777777777 30.116666666666664 51.111111111111114 46.33333333333333 51.111111111111114C 62.55 51.111111111111114 76.44999999999999 60 92.66666666666666 60C 108.88333333333333 60 122.78333333333333 24.444444444444443 139 24.444444444444443C 155.21666666666667 24.444444444444443 169.11666666666665 55.55555555555556 185.33333333333331 55.55555555555556C 201.54999999999998 55.55555555555556 215.45 6.666666666666657 231.66666666666666 6.666666666666657C 247.88333333333333 6.666666666666657 261.7833333333333 17.777777777777786 278 17.777777777777786C 278 17.777777777777786 278 17.777777777777786 278 100M 278 17.777777777777786z"
                                                  pathFrom="M -1 140L -1 140L 46.33333333333333 140L 92.66666666666666 140L 139 140L 185.33333333333331 140L 231.66666666666666 140L 278 140"></path>
                                            <path id="SvgjsPath1024"
                                                  d="M0 77.77777777777777C16.216666666666665 77.77777777777777 30.116666666666664 51.111111111111114 46.33333333333333 51.111111111111114C62.55 51.111111111111114 76.44999999999999 60 92.66666666666666 60C108.88333333333333 60 122.78333333333333 24.444444444444443 139 24.444444444444443C155.21666666666667 24.444444444444443 169.11666666666665 55.55555555555556 185.33333333333331 55.55555555555556C201.54999999999998 55.55555555555556 215.45 6.666666666666657 231.66666666666666 6.666666666666657C247.88333333333333 6.666666666666657 261.7833333333333 17.777777777777786 278 17.777777777777786C278 17.777777777777786 278 17.777777777777786 278 17.777777777777786 "
                                                  fill="none" fill-opacity="1" stroke="#7367f0" stroke-opacity="1"
                                                  stroke-linecap="butt" stroke-width="2.5" stroke-dasharray="0"
                                                  class="apexcharts-area" index="0"
                                                  clip-path="url(#gridRectMaskm350p5ts)"
                                                  pathTo="M 0 77.77777777777777C 16.216666666666665 77.77777777777777 30.116666666666664 51.111111111111114 46.33333333333333 51.111111111111114C 62.55 51.111111111111114 76.44999999999999 60 92.66666666666666 60C 108.88333333333333 60 122.78333333333333 24.444444444444443 139 24.444444444444443C 155.21666666666667 24.444444444444443 169.11666666666665 55.55555555555556 185.33333333333331 55.55555555555556C 201.54999999999998 55.55555555555556 215.45 6.666666666666657 231.66666666666666 6.666666666666657C 247.88333333333333 6.666666666666657 261.7833333333333 17.777777777777786 278 17.777777777777786"
                                                  pathFrom="M -1 140L -1 140L 46.33333333333333 140L 92.66666666666666 140L 139 140L 185.33333333333331 140L 231.66666666666666 140L 278 140"></path>
                                            <g id="SvgjsG1017" class="apexcharts-series-markers-wrap">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1037" r="0" cx="0" cy="77.77777777777777"
                                                            class="apexcharts-marker w139v0ve9 no-pointer-events"
                                                            stroke="#ffffff" fill="#7367f0" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9"
                                                            default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1018" class="apexcharts-datalabels"></g>
                                        </g>
                                    </g>
                                    <line id="SvgjsLine1032" x1="0" y1="0" x2="278" y2="0" stroke="#b6b6b6"
                                          stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1033" x1="0" y1="0" x2="278" y2="0" stroke-dasharray="0"
                                          stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1034" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1035" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1036" class="apexcharts-point-annotations"></g>
                                </g>
                                <rect id="SvgjsRect1010" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe"
                                      opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                <g id="SvgjsG1027" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)">
                                    <g id="SvgjsG1028" class="apexcharts-yaxis-texts-g"></g>
                                </g>
                            </svg>
                            <div class="apexcharts-legend"></div>
                            <div class="apexcharts-tooltip light" style="left: 11px; top: 66.2px;">
                                <div class="apexcharts-tooltip-series-group active" style="display: flex;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(115, 103, 240);"></span>
                                    <div class="apexcharts-tooltip-text"
                                         style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-label">Subscribers: </span><span
                                                    class="apexcharts-tooltip-text-value">28</span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 279px; height: 101px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-package text-warning font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mb-25">97.5K</h2>
                    <p class="mb-0">Orders Received</p>
                </div>
                <div class="card-content" style="position: relative;">
                    <div id="orders-received-chart" style="min-height: 100px;">
                        <div id="apexcharts6cy90flc" class="apexcharts-canvas apexcharts6cy90flc light"
                             style="width: 278px; height: 100px;">
                            <svg id="SvgjsSvg1038" width="278" height="100" xmlns="http://www.w3.org/2000/svg"
                                 version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                 transform="translate(0, 0)" style="background: transparent;">
                                <g id="SvgjsG1040" class="apexcharts-inner apexcharts-graphical"
                                   transform="translate(0, 0)">
                                    <defs id="SvgjsDefs1039">
                                        <clipPath id="gridRectMask6cy90flc">
                                            <rect id="SvgjsRect1044" width="280.5" height="102.5" x="-1.25" y="-1.25"
                                                  rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0"
                                                  stroke="none" stroke-dasharray="0"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMask6cy90flc">
                                            <rect id="SvgjsRect1045" width="280" height="102" x="-1" y="-1" rx="0"
                                                  ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0"></rect>
                                        </clipPath>
                                        <linearGradient id="SvgjsLinearGradient1051" x1="0" y1="0" x2="0" y2="1">
                                            <stop id="SvgjsStop1052" stop-opacity="0.7"
                                                  stop-color="rgba(255,159,67,0.7)" offset="0"></stop>
                                            <stop id="SvgjsStop1053" stop-opacity="0.5"
                                                  stop-color="rgba(255,245,236,0.5)" offset="0.8"></stop>
                                            <stop id="SvgjsStop1054" stop-opacity="0.5"
                                                  stop-color="rgba(255,245,236,0.5)" offset="1"></stop>
                                        </linearGradient>
                                    </defs>
                                    <line id="SvgjsLine1043" x1="0" y1="0" x2="0" y2="100" stroke="#b6b6b6"
                                          stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1"
                                          height="100" fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                          stroke-width="1"></line>
                                    <g id="SvgjsG1057" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1058" class="apexcharts-xaxis-texts-g"
                                           transform="translate(0, -4)"></g>
                                    </g>
                                    <g id="SvgjsG1061" class="apexcharts-grid">
                                        <line id="SvgjsLine1063" x1="0" y1="100" x2="278" y2="100" stroke="transparent"
                                              stroke-dasharray="0"></line>
                                        <line id="SvgjsLine1062" x1="0" y1="1" x2="0" y2="100" stroke="transparent"
                                              stroke-dasharray="0"></line>
                                    </g>
                                    <g id="SvgjsG1047" class="apexcharts-area-series apexcharts-plot-series">
                                        <g id="SvgjsG1048" class="apexcharts-series" seriesName="Orders"
                                           data:longestSeries="true" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath1055"
                                                  d="M0 100L0 60C16.216666666666665 60 30.116666666666664 10 46.33333333333333 10C62.55 10 76.44999999999999 80 92.66666666666666 80C108.88333333333333 80 122.78333333333333 10 139 10C155.21666666666667 10 169.11666666666665 90 185.33333333333331 90C201.54999999999998 90 215.45 40 231.66666666666666 40C247.88333333333333 40 261.7833333333333 80 278 80C278 80 278 80 278 100M278 80C278 80 278 80 278 80 "
                                                  fill="url(#SvgjsLinearGradient1051)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-area" index="0"
                                                  clip-path="url(#gridRectMask6cy90flc)"
                                                  pathTo="M 0 100L 0 60C 16.216666666666665 60 30.116666666666664 10 46.33333333333333 10C 62.55 10 76.44999999999999 80 92.66666666666666 80C 108.88333333333333 80 122.78333333333333 10 139 10C 155.21666666666667 10 169.11666666666665 90 185.33333333333331 90C 201.54999999999998 90 215.45 40 231.66666666666666 40C 247.88333333333333 40 261.7833333333333 80 278 80C 278 80 278 80 278 100M 278 80z"
                                                  pathFrom="M -1 160L -1 160L 46.33333333333333 160L 92.66666666666666 160L 139 160L 185.33333333333331 160L 231.66666666666666 160L 278 160"></path>
                                            <path id="SvgjsPath1056"
                                                  d="M0 60C16.216666666666665 60 30.116666666666664 10 46.33333333333333 10C62.55 10 76.44999999999999 80 92.66666666666666 80C108.88333333333333 80 122.78333333333333 10 139 10C155.21666666666667 10 169.11666666666665 90 185.33333333333331 90C201.54999999999998 90 215.45 40 231.66666666666666 40C247.88333333333333 40 261.7833333333333 80 278 80C278 80 278 80 278 80 "
                                                  fill="none" fill-opacity="1" stroke="#ff9f43" stroke-opacity="1"
                                                  stroke-linecap="butt" stroke-width="2.5" stroke-dasharray="0"
                                                  class="apexcharts-area" index="0"
                                                  clip-path="url(#gridRectMask6cy90flc)"
                                                  pathTo="M 0 60C 16.216666666666665 60 30.116666666666664 10 46.33333333333333 10C 62.55 10 76.44999999999999 80 92.66666666666666 80C 108.88333333333333 80 122.78333333333333 10 139 10C 155.21666666666667 10 169.11666666666665 90 185.33333333333331 90C 201.54999999999998 90 215.45 40 231.66666666666666 40C 247.88333333333333 40 261.7833333333333 80 278 80"
                                                  pathFrom="M -1 160L -1 160L 46.33333333333333 160L 92.66666666666666 160L 139 160L 185.33333333333331 160L 231.66666666666666 160L 278 160"></path>
                                            <g id="SvgjsG1049" class="apexcharts-series-markers-wrap">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1069" r="0" cx="0" cy="0"
                                                            class="apexcharts-marker wpga9pyu1 no-pointer-events"
                                                            stroke="#ffffff" fill="#ff9f43" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9"
                                                            default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1050" class="apexcharts-datalabels"></g>
                                        </g>
                                    </g>
                                    <line id="SvgjsLine1064" x1="0" y1="0" x2="278" y2="0" stroke="#b6b6b6"
                                          stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1065" x1="0" y1="0" x2="278" y2="0" stroke-dasharray="0"
                                          stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1066" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1067" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1068" class="apexcharts-point-annotations"></g>
                                </g>
                                <rect id="SvgjsRect1042" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe"
                                      opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                <g id="SvgjsG1059" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)">
                                    <g id="SvgjsG1060" class="apexcharts-yaxis-texts-g"></g>
                                </g>
                            </svg>
                            <div class="apexcharts-legend"></div>
                            <div class="apexcharts-tooltip light">
                                <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker"
                                                                                   style="background-color: rgb(255, 159, 67);"></span>
                                    <div class="apexcharts-tooltip-text"
                                         style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-label"></span><span
                                                    class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 279px; height: 101px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>