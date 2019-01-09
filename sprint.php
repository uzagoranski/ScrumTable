<?php
$page_title = 'Sprint';

require('includes/config.php');
include('includes/header.php');

require(MYSQL);
?>

    <section id="pricing">

        <div class="row section-intro animate-this">
            <div class="col-twelve with-bottom-line">

                <h2>Sprint </h2>

                <p class="lead">Vsi Taski Sprinta pri projektu</p>

            </div>
        </div>

        <div class="row pricing-content">

            <div class="pricing-tables block-1-3  group">

                <div class="bgrid animate-this">

                    <div class="price-block primary" data-info="To Do">

                        <div class="top-part">

                            <h3 class="plan-title">Starter</h3>
                            <p class="plan-price"><sup>$</sup>4.99</p>
                            <p class="price-month">Per month</p>

                        </div>

                        <div class="bottom-part">

                            <ul class="features">
                                <li><strong>3GB</strong> Storage</li>
                                <li><strong>10GB</strong> Bandwidth</li>
                                <li><strong>5</strong> Databases</li>
                                <li><strong>30</strong> Email Accounts</li>
                            </ul>

                            <a class="button large" href="">Nov Task</a>

                        </div>

                    </div>

                </div> <!-- /bgrid -->

                <div class="bgrid animate-this">

                    <div class="price-block primary" data-info="In Progress">

                        <div class="top-part">

                            <h3 class="plan-title">Standard</h3>
                            <p class="plan-price"><sup>$</sup>9.99</p>
                            <p class="price-month">Per month</p>

                        </div>

                        <div class="bottom-part">

                            <ul class="features">
                                <li><strong>5GB</strong> Storage</li>
                                <li><strong>15GB</strong> Bandwidth</li>
                                <li><strong>7</strong> Databases</li>
                                <li><strong>40</strong> Email Accounts</li>
                            </ul>

                            <a class="button large" href="">prazno</a>

                        </div>

                    </div>

                </div> <!-- /bgrid -->

                <div class="bgrid animate-this">

                    <div class="price-block primary" data-info="Done">

                        <div class="top-part">

                            <h3 class="plan-title">Premium</h3>
                            <p class="plan-price"><sup>$</sup>29.99</p>
                            <p class="price-month">Per month</p>

                        </div>

                        <div class="bottom-part">

                            <ul class="features">
                                <li><strong>10GB</strong> Storage</li>
                                <li><strong>30GB</strong> Bandwidth</li>
                                <li><strong>15</strong> Databases</li>
                                <li><strong>60</strong> Email Accounts</li>
                            </ul>

                            <a class="button large" href="">prazno</a>

                        </div>

                    </div>

                </div> <!-- /bgrid -->

            </div> <!-- /pricing-tables -->

        </div> <!-- /pricing-content -->

    </section> <!-- Pricing -->

<?php include('includes/footer.php'); ?>