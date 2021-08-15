/*global $, document*/

function consultaProduto(id){
    var myHeaders = new Headers();
    myHeaders.append("Accept", "application/json");
    myHeaders.append("Cookie", "XSRF-TOKEN=eyJpdiI6InBYdzVaUEhEYlRRbFNSQUdNL2Q4ZHc9PSIsInZhbHVlIjoiQW5MN3p6N3N3TmZRb201RXp5VWNtM2VRSFBHZElvcU5qSFA1b2VlT3k4cWgzWkF5N2p6eDF3KzdGNDVUMnRQS2hoL0JvNnp0K25nNGNNM2wxaFQ5YnJDc21PR1hCUms5R29XZ3czWVJuMm9DZ3pZRXcrN2s3RkJLQVVPaldXNysiLCJtYWMiOiI1OTI1MTFhOTdlZGZiZmQ3MzcwMjFlNmY2NzgyZWM1OTc4NmQ2ZTNkZjRhMTQwMjk2NThiOTI2MTY1MTY2YzdiIn0%3D; laravel_session=eyJpdiI6IjF0N045RUpkdURZWDRIT2w2Yk9jRHc9PSIsInZhbHVlIjoianlPVlVRbnlaaFJncTk1UDF6K0Y4bDBqdTlRaStMZkpoMnQyaVE1WHhoemZUN1pHTHMxRTVpWkNoeEh2M29hWTFoUnY5K3NpR043UjVKYkxTKzR4RGs0aGdOeGx0bFNTMUNGaDVrcHpMdm1DV1hkc29zVlAwWGw4U1F0VEs5M3AiLCJtYWMiOiIwNzhlOThmOWZkMjE2MDY4ZjhiODAyMGMwZGIyYWQ0NmEwNzM1NTA1M2E2MGVhOTliMTY3YmE4OGM4NGM0NjA1In0%3D");

    var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
    };
    
    var produto = fetch(`http://localhost:8000/produto/${id}`, requestOptions)
        .then(response => response.json())
        .catch(error => console.log('error', error));
    
    return produto;
}

function consultaGeral(){
    var myHeaders = new Headers();
    myHeaders.append("Accept", "application/json");
    myHeaders.append("Cookie", "XSRF-TOKEN=eyJpdiI6InBYdzVaUEhEYlRRbFNSQUdNL2Q4ZHc9PSIsInZhbHVlIjoiQW5MN3p6N3N3TmZRb201RXp5VWNtM2VRSFBHZElvcU5qSFA1b2VlT3k4cWgzWkF5N2p6eDF3KzdGNDVUMnRQS2hoL0JvNnp0K25nNGNNM2wxaFQ5YnJDc21PR1hCUms5R29XZ3czWVJuMm9DZ3pZRXcrN2s3RkJLQVVPaldXNysiLCJtYWMiOiI1OTI1MTFhOTdlZGZiZmQ3MzcwMjFlNmY2NzgyZWM1OTc4NmQ2ZTNkZjRhMTQwMjk2NThiOTI2MTY1MTY2YzdiIn0%3D; laravel_session=eyJpdiI6IjF0N045RUpkdURZWDRIT2w2Yk9jRHc9PSIsInZhbHVlIjoianlPVlVRbnlaaFJncTk1UDF6K0Y4bDBqdTlRaStMZkpoMnQyaVE1WHhoemZUN1pHTHMxRTVpWkNoeEh2M29hWTFoUnY5K3NpR043UjVKYkxTKzR4RGs0aGdOeGx0bFNTMUNGaDVrcHpMdm1DV1hkc29zVlAwWGw4U1F0VEs5M3AiLCJtYWMiOiIwNzhlOThmOWZkMjE2MDY4ZjhiODAyMGMwZGIyYWQ0NmEwNzM1NTA1M2E2MGVhOTliMTY3YmE4OGM4NGM0NjA1In0%3D");

    var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
    };
    
    var geral = fetch(`http://localhost:8000/metricasGerais`, requestOptions)
        .then(response => response.json())
        .catch(error => console.log('error', error));
    
    return geral;
}

$(document).ready(async function () {
    var url = window.location.href.toString();
    url = url.split("/produto/");
    var produto_id = url[1];
    var geral = await consultaGeral();
    let produto = await consultaProduto(produto_id);

    // console.log(geral);
    // let geral= {
    //     estoque: 100 + produto.produto.estoque,
    //     horariosVenda: [
    //         {quantidade_venda_media: 10, horario_venda: 17},
    //         {quantidade_venda_media: 6, horario_venda: 18},
    //         {quantidade_venda_media: 4, horario_venda: 19}
    //     ],
    //     faturamentoTotal: parseInt(produto.faturamentoTotal) + 100,
    //     lucroTotal: parseInt(produto.lucroTotal) + 100,
    //     margemLucro: parseInt(produto.margemLucro) + 10,
    //     quantidadeProdutoVendido: parseInt(produto.quantidadeProdutoVendido) +10 ,
        
        
    // };

    Chart.defaults.global.defaultFontColor = '#75787c';

    // ------------------------------------------------------- //
    // Line Chart Custom 1
    // ------------------------------------------------------ //
    var LINECHARTEXMPLE   = $('#lineChartCustom1');
    var lineChartExample = new Chart(LINECHARTEXMPLE, {
        type: 'line',
        options: {
            legend: {labels:{fontColor:"#777", fontSize: 12}},
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: {
                        color: 'transparent'
                    }
                }],
                yAxes: [{
                    ticks: {
                        max: 60,
                        min: 0
                    },
                    display: true,
                    gridLines: {
                        color: 'transparent'
                    }
                }]
            },
        },
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Data Set One",
                    fill: true,
                    lineTension: 0,
                    backgroundColor: "rgba(134, 77, 217, 0.88)",
                    borderColor: "rgba(134, 77, 217, 088)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 1,
                    pointBorderColor: "rgba(134, 77, 217, 0.88)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(134, 77, 217, 0.88)",
                    pointHoverBorderColor: "rgba(134, 77, 217, 0.88)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: [0, 20, 17, 40, 30, 22, 30],
                    spanGaps: false
                },
                {
                    label: "Data Set Two",
                    fill: true,
                    lineTension: 0,
                    backgroundColor: "rgba(98, 98, 98, 0.5)",
                    borderColor: "rgba(98, 98, 98, 0.5)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 1,
                    pointBorderColor: "rgba(98, 98, 98, 0.5)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(98, 98, 98, 0.5)",
                    pointHoverBorderColor: "rgba(98, 98, 98, 0.5)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: [0, 30, 22, 20, 35, 25, 50],
                    spanGaps: false
                }
            ]
        }
    });



    // ------------------------------------------------------- //
    // Bar Chart Custom 1
    // ------------------------------------------------------ //
    var BARCHART1 = $('#barChartCustom1');
    var barChartHome = new Chart(BARCHART1, {
        type: 'bar',
        options:
        {
            scales:
            {
                xAxes: [{
                    display: true,
                    barPercentage: 0.2
                }],
                yAxes: [{
                    // ticks: {
                    //     max: produto.horariosVenda[2].horario_venda + 10,
                    //     min: 0
                    // },
                    display: false
                }],
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: [`${produto.horariosVenda[0].horario_venda}Hr`, `${produto.horariosVenda[1].horario_venda}Hr`, `${produto.horariosVenda[2].horario_venda}Hr`],
            datasets: [
                {
                    label: "Quantidade",
                    backgroundColor: [
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99'
                       
                    ],
                    borderColor: [
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99'
                    ],
                    borderWidth: 0.3,
                    data: [produto.horariosVenda[0].quantidade_venda_media ,produto.horariosVenda[1].quantidade_venda_media ,produto.horariosVenda[2].quantidade_venda_media ]
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Bar Chart Example 2
    // ------------------------------------------------------ //
    var BARCHART1 = $('#barChartCustom2');
    var barChartHome = new Chart(BARCHART1, {
        type: 'bar',
        options:
        {
            scales:
            {
                xAxes: [{
                    display: true,
                    barPercentage: 0.2
                }],
                yAxes: [{
                    // ticks: {
                    //     max: (geral.horariosVenda[2].horario_venda + 10),
                    //     min: 0
                    // },
                    display: false
                }],
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: [`${geral.horariosVenda[0].horario_venda}Hr`, `${geral.horariosVenda[1].horario_venda}Hr`, `${geral.horariosVenda[2].horario_venda}Hr`],
            datasets: [
                {
                    label: "Quantidade",
                    backgroundColor: [
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9'
                    ],
                    borderColor: [
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9'
                    ],
                    borderWidth: 0.2,
                    data: [geral.horariosVenda[0].quantidade_venda_media, geral.horariosVenda[1].quantidade_venda_media, geral.horariosVenda[2].quantidade_venda_media]
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Line Chart Custom 2
    // ------------------------------------------------------ //
    var LINECHART1 = $('#lineChartCustom2');
    var myLineChart = new Chart(LINECHART1, {
        type: 'line',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        max: 40,
                        min: 10,
                        stepSize: 0.1
                    },
                    display: false,
                    gridLines: {
                        display: false
                    }
                }]
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "L", "M", "N", "O", "P", "Q", "R", "S", "T"],
            datasets: [
                {
                    label: "Team Drills",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "transparent",
                    borderColor: '#EF8C99',
                    pointBorderColor: '#EF8C99',
                    pointHoverBackgroundColor: '#EF8C99',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "#EF8C99",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 0,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    data: [20, 21, 25, 22, 24, 18, 20, 23, 19, 22, 25, 19, 24, 27, 22, 17, 20, 17, 20, 26, 22],
                    spanGaps: false
                },
                {
                    label: "Team Drills",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "transparent",
                    borderColor: 'rgba(238, 139, 152, 0.24)',
                    pointBorderColor: 'rgba(238, 139, 152, 0.24)',
                    pointHoverBackgroundColor: 'rgba(238, 139, 152, 0.24)',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "rgba(238, 139, 152, 0.24)",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 0,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    data: [24, 20, 23, 19, 22, 20, 25, 21, 23, 19, 21, 23, 19, 24, 19, 22, 21, 24, 19, 21, 20],
                    spanGaps: false
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Line Chart Custom 3
    // ------------------------------------------------------ //
    var LINECHART1 = $('#lineChartCustom3');
    var myLineChart = new Chart(LINECHART1, {
        type: 'line',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        max: 40,
                        min: 10,
                        stepSize: 0.1
                    },
                    display: false,
                    gridLines: {
                        display: false
                    }
                }]
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "L", "M", "N", "O", "P", "Q", "R", "S", "T"],
            datasets: [
                {
                    label: "Team Drills",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "transparent",
                    borderColor: '#CF53F9',
                    pointBorderColor: '#CF53F9',
                    pointHoverBackgroundColor: '#CF53F9',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "#CF53F9",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 0,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    data: [24, 20, 23, 19, 22, 20, 25, 21, 23, 19, 21, 23, 19, 24, 19, 22, 21, 24, 19, 21, 20],
                    spanGaps: false
                },
                {
                    label: "Team Drills",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "transparent",
                    borderColor: 'rgba(207, 83, 249, 0.24)',
                    pointBorderColor: 'rgba(207, 83, 249, 0.24)',
                    pointHoverBackgroundColor: 'rgba(207, 83, 249, 0.24)',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "rgba(207, 83, 249, 0.24)",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 0,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    data: [20, 21, 25, 22, 24, 18, 20, 23, 19, 22, 25, 19, 24, 27, 22, 17, 20, 17, 20, 26, 22],
                    spanGaps: false
                }
            ]
        }
    });



    // ------------------------------------------------------- //
    // Bar Chart
    // ------------------------------------------------------ //
    var BARCHARTEXMPLE    = $('#barChartCustom3');
    var barChartExample = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: 'transparent'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: 'transparent'
                    }
                }]
            },
        },
        data: {
            labels: ["faturamentoTotal", "lucroTotal"],
            datasets: [
                {
                    label: "Produto Individual",
                    backgroundColor: [
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9"
                    ],
                    hoverBackgroundColor: [
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9"
                    ],
                    borderColor: [
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9"
                    ],
                    borderWidth: 0.5,
                    data: [produto.faturamentoTotal + 0, produto.lucroTotal + 0],
                },
                {
                    label: "Geral",
                    backgroundColor: [
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)"
                    ],
                    borderColor: [
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)"
                    ],
                    borderWidth: 0.5,
                    data: [parseInt(geral.faturamentoTotal), parseInt(geral.lucroTotal)],
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Pie Chart Custom 1
    // ------------------------------------------------------ //
    var PIECHARTEXMPLE    = $('#pieChartCustom1');
    var pieChartExample = new Chart(PIECHARTEXMPLE, {
        type: 'pie',
        options: {
            legend: {
                display: true,
                position: "left"
            }
        },
        data: {
            labels: [
                "A",
                "B",
                "C",
                "D"
            ],
            datasets: [
                {
                    data: [300, 50, 100, 80],
                    borderWidth: 0,
                    backgroundColor: [
                        '#723ac3',
                        "#864DD9",
                        "#9762e6",
                        "#a678eb"
                    ],
                    hoverBackgroundColor: [
                        '#723ac3',
                        "#864DD9",
                        "#9762e6",
                        "#a678eb"
                    ]
                }]
            }
    });

    var pieChartExample = {
        responsive: true
    };



    // ------------------------------------------------------- //
    // Doughnut Chart Custom
    // ------------------------------------------------------ //
    var PIECHART = $('#doughnutChartCustom1');
    var myPieChart = new Chart(PIECHART, {
        type: 'doughnut',
        options: {
            cutoutPercentage: 80,
            legend: {
                display: true,
                position: "left"
            }
        },
        data: {
            labels: [
                "Geral",
                "Produto",
            ],
            datasets: [
                {
                    data: [(geral.estoque - produto.produto.estoque) /geral.estoque * 100, produto.produto.estoque / geral.estoque * 100],
                    borderWidth: [0, 0],
                    backgroundColor: [
                        '#7127AC',
                        "#CF53F9"
                    ],
                    hoverBackgroundColor: [
                        '#7127AC',
                        "#CF53F9"
                    ]
                }]
        }
    });



    // ------------------------------------------------------- //
    // Polar Chart
    // ------------------------------------------------------ //
    var chartOptions = {
        scale: {    
            gridLines: {
                color: '#3f4145'
            },
            ticks: {
                beginAtZero: true,
                min: 0,
                max: 100,
                stepSize: 20
            },
            pointLabels: {
                fontSize: 12
            }
        },
        legend: {
            position: 'left'
        },
        elements: {
            arc: {
                borderWidth: 0,
                borderColor: 'transparent'
            }
        }
    };
    var POLARCHARTEXMPLE  = $('#polarChartCustom');
    var polarChartExample = new Chart(POLARCHARTEXMPLE, {
        type: 'polarArea',
        options: chartOptions,
        data: {
            datasets: [{
                data: [
                    80,
                    70,
                    60,
                    50
                ],
                backgroundColor: [
                    "#ba3fe4",
                    "#CF53F9",
                    "#d97bf9",
                    "#e28eff"
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                "A",
                "B",
                "C",
                "D"
            ]
        }
    });

    var polarChartExample = {
        responsive: true
    };



    // ------------------------------------------------------- //
    // Radar Chart
    // ------------------------------------------------------ //
    var chartOptions = {
        scale: {
            gridLines: {
                color: '#3f4145'
            },
            ticks: {
                beginAtZero: true,
                min: 0,
                max: 100,
                stepSize: 20
            },
            pointLabels: {
                fontSize: 12
            }
        },
        legend: {
            position: 'left'
        }
    };
    var RADARCHARTEXMPLE  = $('#radarChartCustom');
    

    // consultaProduto(produto_id);

    // console.log(produto);

    var radarChartExample = new Chart(RADARCHARTEXMPLE, {
        type: 'radar',
        options: chartOptions,
        data: {
            labels: ["LTV", "Taxa de Conversão", "Margem de Lucro", "", "NPS", "ROI"],
            datasets: [
                {
                    label: "First dataset",
                    backgroundColor: "rgba(113, 39, 172, 0.4)",
                    borderWidth: 2,
                    borderColor: "#7127AC",
                    pointBackgroundColor: "#7127AC",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#7127AC",
                    data: [2 * 10, 8 * 10, produto.margemLucro * 10, 1 * 10, (produto.produto.nps + 0) * 10, 5.0 * 10]
                },
                {
                    label: "Second dataset",
                    backgroundColor: "rgba(207, 83, 249, 0.4)",
                    borderWidth: 2,
                    borderColor: "#CF53F9",
                    pointBackgroundColor: "#CF53F9",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#CF53F9",
                    data: [3 * 10, 7 * 10, 2.5 * 10, 1 * 10, 10 * 10, 8.5 * 10, 1.0 * 10]
                }
            ]
        }
    });
    var radarChartExample = {
        responsive: true
    };







});
