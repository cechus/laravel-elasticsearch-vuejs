<html>

<head>
    <title>Articles</title>
    <link rel="stylesheet" href="/css/app.css">\
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <style>
        .search-form .form-group {
            float: right !important;
            transition: all 0.35s, border-radius 0s;
            width: 32px;
            height: 32px;
            background-color: #fff;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            border-radius: 25px;
            border: 1px solid #ccc;
        }

        .search-form .form-group input.form-control {
            padding-right: 20px;
            border: 0 none;
            background: transparent;
            box-shadow: none;
            display: block;
        }

        .search-form .form-group input.form-control::-webkit-input-placeholder {
            display: none;
        }

        .search-form .form-group input.form-control:-moz-placeholder {
            /* Firefox 18- */
            display: none;
        }

        .search-form .form-group input.form-control::-moz-placeholder {
            /* Firefox 19+ */
            display: none;
        }

        .search-form .form-group input.form-control:-ms-input-placeholder {
            display: none;
        }

        .search-form .form-group:hover,
        .search-form .form-group.hover {
            width: 100%;
            border-radius: 4px 25px 25px 4px;
        }

        .search-form .form-group span.form-control-feedback {
            position: absolute;
            top: -1px;
            right: -2px;
            z-index: 2;
            display: block;
            width: 34px;
            height: 34px;
            line-height: 34px;
            text-align: center;
            color: #3596e0;
            left: initial;
            font-size: 14px;
        }

        </style>
</head>

<body>

    {{-- <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Articles <small>({{ $articles->count() }})</small>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="container">
                            <form action="{{ url('search') }}" method="get">
                                <div class="form-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search..." value="{{ request('q') }}" />
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="container">
                            @forelse ($articles as $article)
                            <article>
                                <h2>{{ $article->title }}</h2>

                                <p>{{ $article->body }}</p>

                                    <p class="well">
                                        {{ implode(', ', $article->tags ?: []) }}
                                    </p>
                            </article>
                            @empty
                            <p>No articles found</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container" id="app">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Search Cities around the world</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <form action="" class="search-form">
                    <div class="form-group has-feedback">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" name="search" id="search" placeholder="search" v-model="query">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" v-for="result in results">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        @{{result.title}}
                    </div>
                    <div class="panel-body">
                        @{{result.body}}
                    </div>
                    <div class="panel-footer">
                        @{{result.tags}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //template.html
            // create a new Vue instance
            var app = new Vue({
                el: '#app',
                // declare the data for the component (An array that houses the results and a query that holds the current search string)
                data: {
                    results: [],
                    query: ''
                },
                // declare methods in this Vue component. here only one method which performs the search is defined
                methods: {
                    // make an axios request to the server with the current search query
                    search: function () {
                        axios.get("/search?q=" + this.query)
                            .then(response => {
                                this.results = response.data;

                            })
                    }
                },
                // declare Vue watchers
                watch: {
                    // watch for change in the query string and recall the search method
                    query: function () {
                        this.search();
                    }
                }

            })

    </script>
</body>

</html>