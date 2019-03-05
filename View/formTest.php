<?php
/*
    Description: Dundee Picture House Home Page used to display movies and navigation.
    Author: David McRae
*/
?>
<html>
<!--<head>-->
    <?php
        include '../Controller/getAllMovies.php';
        //include '../Model/DPH-api.php';
        include 'header.php';
    ?>
<body>

<div class="table_container" style="height: 100%; width: 100%; display: block;position: absolute;overflow: hidden;">
<div class="table-responsive" style="min-height:100%;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ticket</th>
                            <th>Amount</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                              <div class="form-group input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupPrepend">Ticket Type</span>
                                </div>
                                <select class="custom-select" name="ticketType" required>
                                  <option value="">Please Select what type of ticket you would like.</option>
                                  <option value="standardAdult">Standard Adult</option>
                                  <option value="standardChild">Standard Child</option>
                                  <option value="standardStudent">Standard Student</option>
                                </select>1
                            <div class="invalid-feedback"></div>
                              </div>
                            </td>

                            <td>
                                DATA
                                <div class="btn-group btn-group-rounded">
                                    <button type="button" class="btn btn-default btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:3px;">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">One</a></li>
                                        <li><a href="#">Two</a></li>
                                        <li><a href="#">Three</a></li>
                                        <li role="seperator" class="divider"></li>
                                        <li><a href="#">Four</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                DATA
                                <div class="btn-group btn-group-rounded">
                                    <button type="button" class="btn btn-default btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:3px;">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">One</a></li>
                                        <li><a href="#">Two</a></li>
                                        <li><a href="#">Three</a></li>
                                        <li role="seperator" class="divider"></li>
                                        <li><a href="#">Four</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>DATA</td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-group input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">Ticket Type</span>
                              </div>
                              <select class="custom-select" name="ticketType" required>
                                <option value="">Please Select what type of ticket you would like.</option>
                                <option value="premiumAdult">Premium Adult</option>
                                <option value="premiumChild">Premium Child</option>
                                <option value="premiumStudent">Premium Student</option>
                              </select>
                              <div class="invalid-feedback"></div>
                            </div>
                          </td>

                            <td>
                                DATA
                                <div class="btn-group btn-group-rounded">
                                    <button type="button" class="btn btn-default btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:3px;">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">One</a></li>
                                        <li><a href="#">Two</a></li>
                                        <li><a href="#">Three</a></li>
                                        <li role="seperator" class="divider"></li>
                                        <li><a href="#">Four</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                DATA
                                <div class="btn-group btn-group-rounded">
                                    <button type="button" class="btn btn-default btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:3px;">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">One</a></li>
                                        <li><a href="#">Two</a></li>
                                        <li><a href="#">Three</a></li>
                                        <li role="seperator" class="divider"></li>
                                        <li><a href="#">Four</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>DATA</td>
                        </tr>
                    </tbody>
                </table>
            </div>
</div>
<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->

    <?php include '../Controller/bootstrapScript.php'; ?>
</body>
</html>
