@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Istoric</div>

                    <div class="panel-body">
                        <div class="col-md-6 col-md-offset-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Pret</th>
                                    <th>Stoc</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($data as $elem ) {

                            echo '<tr>';
                                echo "<td>$elem->pret</td>";
                                echo "<td>$elem->stoc</td>";
                            echo '</tr>';
}
                            ?>
                            </tbody>
                        </table>

                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
