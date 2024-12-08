<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>지진 발생 횟수 시각화</title>
    <!-- Pretendard 폰트 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/pretendard@1.3.2/dist/webfont.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <style>
        body {
            font-family: 'Pretendard', sans-serif;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Header Section -->
    <header class="bg-primary text-white text-center py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Home Icon -->
            <a href="index.php" class="text-white text-decoration-none">
                <i class="bi bi-house-door-fill" style="font-size: 1.5rem;"></i>
            </a>
            <h3 class="mb-0">지진 발생 횟수 시각화</h3>
            <!-- Empty space to balance title and icon -->
            <span></span>
        </div>
    </header>
    <!-- Graph Section -->
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <svg id="line-chart" class="w-100" style="height: 500px;"></svg>
            </div>
            <div>
                통계 자료 출처: <a href="">기상청</a>
            </div>
        </div>
    </div>
    <!-- D3.js Script -->
    <script>
        // Sample Data
        const data = [
            { "연도": 1978, "총 횟수(규모 2이상)": 6 },
            { "연도": 1979, "총 횟수(규모 2이상)": 22 },
            { "연도": 1980, "총 횟수(규모 2이상)": 16 },
            { "연도": 1981, "총 횟수(규모 2이상)": 15 },
            { "연도": 1982, "총 횟수(규모 2이상)": 13 },
            { "연도": 1983, "총 횟수(규모 2이상)": 20 },
            { "연도": 1984, "총 횟수(규모 2이상)": 19 },
            { "연도": 1985, "총 횟수(규모 2이상)": 26 },
            { "연도": 1986, "총 횟수(규모 2이상)": 15 },
            { "연도": 1987, "총 횟수(규모 2이상)": 11 },
            { "연도": 1988, "총 횟수(규모 2이상)": 6 },
            { "연도": 1989, "총 횟수(규모 2이상)": 16 },
            { "연도": 1990, "총 횟수(규모 2이상)": 15 },
            { "연도": 1991, "총 횟수(규모 2이상)": 19 },
            { "연도": 1992, "총 횟수(규모 2이상)": 15 },
            { "연도": 1993, "총 횟수(규모 2이상)": 22 },
            { "연도": 1994, "총 횟수(규모 2이상)": 24 },
            { "연도": 1995, "총 횟수(규모 2이상)": 29 },
            { "연도": 1996, "총 횟수(규모 2이상)": 39 },
            { "연도": 1997, "총 횟수(규모 2이상)": 21 },
            { "연도": 1998, "총 횟수(규모 2이상)": 32 },
            { "연도": 1999, "총 횟수(규모 2이상)": 37 },
            { "연도": 2000, "총 횟수(규모 2이상)": 29 },
            { "연도": 2001, "총 횟수(규모 2이상)": 41 },
            { "연도": 2002, "총 횟수(규모 2이상)": 49 },
            { "연도": 2003, "총 횟수(규모 2이상)": 38 },
            { "연도": 2004, "총 횟수(규모 2이상)": 42 },
            { "연도": 2005, "총 횟수(규모 2이상)": 37 },
            { "연도": 2006, "총 횟수(규모 2이상)": 50 },
            { "연도": 2007, "총 횟수(규모 2이상)": 42 },
            { "연도": 2008, "총 횟수(규모 2이상)": 46 },
            { "연도": 2009, "총 횟수(규모 2이상)": 60 },
            { "연도": 2010, "총 횟수(규모 2이상)": 42 },
            { "연도": 2011, "총 횟수(규모 2이상)": 52 },
            { "연도": 2012, "총 횟수(규모 2이상)": 56 },
            { "연도": 2013, "총 횟수(규모 2이상)": 93 },
            { "연도": 2014, "총 횟수(규모 2이상)": 49 },
            { "연도": 2015, "총 횟수(규모 2이상)": 44 },
            { "연도": 2016, "총 횟수(규모 2이상)": 252 },
            { "연도": 2017, "총 횟수(규모 2이상)": 223 },
            { "연도": 2018, "총 횟수(규모 2이상)": 115 },
            { "연도": 2019, "총 횟수(규모 2이상)": 88 },
            { "연도": 2020, "총 횟수(규모 2이상)": 68 },
            { "연도": 2021, "총 횟수(규모 2이상)": 70 },
            { "연도": 2022, "총 횟수(규모 2이상)": 77 },
            { "연도": 2023, "총 횟수(규모 2이상)": 106 }
        ];

        const margin = { top: 20, right: 30, bottom: 50, left: 50 };
        const width = document.getElementById('line-chart').clientWidth - margin.left - margin.right;
        const height = 500 - margin.top - margin.bottom;

        const svg = d3.select("#line-chart")
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
            .append("g")
            .attr("transform", `translate(${margin.left},${margin.top})`);

        // X and Y scales
        const x = d3.scaleLinear()
            .domain(d3.extent(data, d => d["연도"]))
            .range([0, width]);

        const y = d3.scaleLinear()
            .domain([0, d3.max(data, d => d["총 횟수(규모 2이상)"])])
            .range([height, 0]);

        // X and Y axis
        svg.append("g")
            .attr("transform", `translate(0,${height})`)
            .call(d3.axisBottom(x).ticks(d3.max(data, d => d["연도"]) - d3.min(data, d => d["연도"])).tickFormat(d3.format("d")));

        svg.append("g")
            .call(d3.axisLeft(y));

        // Line generator
        const line = d3.line()
            .x(d => x(d["연도"]))
            .y(d => y(d["총 횟수(규모 2이상)"]));

        // Add line to SVG
        svg.append("path")
            .datum(data)
            .attr("fill", "none")
            .attr("stroke", "#007bff")
            .attr("stroke-width", 2)
            .attr("d", line);

        // Add points to line
        svg.selectAll("circle")
            .data(data)
            .enter()
            .append("circle")
            .attr("cx", d => x(d["연도"]))
            .attr("cy", d => y(d["총 횟수(규모 2이상)"]))
            .attr("r", 4)
            .attr("fill", "#007bff");
    </script>
</body>
</html>
