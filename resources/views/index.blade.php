<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Test task</title>

    <link href="/css/app.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="page-header">
        <h1>Search for a property <small>Test task</small></h1>
    </div>

    <div id="app">
        <div v-if="loading">
            <p class="text-center lead">Loading...</p>
        </div>

        <form>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" v-model.trim="search" :disabled="loading" placeholder="Type property name...">
                    </div>
                </div>
            </div>

            <div class="row">
                <template v-for="filter in availableFilters">
                    <div class="col-lg-3" v-if="filter.name === 'price_min' || filter.name === 'price_max'" :class="{ 'col-lg-offset-3': filter.name === 'price_min'}">
                        <div class="form-group">
                            <label v-text="filter.value ? filter.display + ' $' + filter.value : filter.display"></label>
                            <input type="range" :min="filter.min" :max="filter.max" class="form-control input-lg" v-model="filter.value" :disabled="loading">
                        </div>
                    </div>

                    <div v-else class="col-lg-3">
                        <div class="form-group">
                            <label v-text="filter.display"></label>
                            <select class="form-control input-lg" v-model="filter.value" :disabled="loading">
                                <option :value="null">Any</option>
                                <option v-for="num in filter.max" v-text="num"></option>
                            </select>
                        </div>
                    </div>
                </template>
            </div>

            <div class="form-group">
                <button class="btn btn-success btn-lg center-block" @click.prevent="request" :disabled="loading">Search</button>
            </div>
        </form>

        <p v-if="results.length > 0 && ! loading">Found: <span v-text="results.length"></span></p>

        <div v-if="! loading" class="row">
            <div v-for="item in results" class="col-lg-4">
                <item :item="item"></item>
            </div>
        </div>
    </div>
</div>

<script src="/js/app.js"></script>
</body>
</html>