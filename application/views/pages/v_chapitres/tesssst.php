<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#"><?php echo $grand_title ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $page_title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="panel-heading"> <i class="fa fa-list"></i> قائمة الأبواب



                <a href="<?php echo base_url('admin/user') ?>" class="btn btn-info btn-sm float-sm-left"><i
                        class="fa fa-plus"></i>&nbsp;إضافة باب</a> &nbsp;

            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Default Basic Forms</h3>
                    <p class="text-muted m-b-30 font-13"> All bootstrap element classies </p>
                    <form class="form">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Text</label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Search</label>
                            <div class="col-10">
                                <input class="form-control" type="search" value="How do I shoot web"
                                    id="example-search-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-2 col-form-label">Email</label>
                            <div class="col-10">
                                <input class="form-control" type="email" value="bootstrap@example.com"
                                    id="example-email-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">URL</label>
                            <div class="col-10">
                                <input class="form-control" type="url" value="https://getbootstrap.com"
                                    id="example-url-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
                            <div class="col-10">
                                <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-2 col-form-label">Password</label>
                            <div class="col-10">
                                <input class="form-control" type="password" value="hunter2" id="example-password-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-number-input" class="col-2 col-form-label">Number</label>
                            <div class="col-10">
                                <input class="form-control" type="number" value="42" id="example-number-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-2 col-form-label">Date and
                                time</label>
                            <div class="col-10">
                                <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00"
                                    id="example-datetime-local-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-date-input" class="col-2 col-form-label">Date</label>
                            <div class="col-10">
                                <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-month-input" class="col-2 col-form-label">Month</label>
                            <div class="col-10">
                                <input class="form-control" type="month" value="2011-08" id="example-month-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-week-input" class="col-2 col-form-label">Week</label>
                            <div class="col-10">
                                <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-time-input" class="col-2 col-form-label">Time</label>
                            <div class="col-10">
                                <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-color-input" class="col-2 col-form-label">Color</label>
                            <div class="col-10">
                                <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- .row -->
<div>
        <button class=" btn-dark">إختر الأعمدة : </button>
                     <a type="button" id="1" class="btn btn-outline-secondary active toggle-vis" data-column="1">رقم الترتيب</a>
                     <a type="button" id="2" class="btn btn-outline-secondary active toggle-vis" data-column="2">اللقب</a>
                     <a type="button" id="3" class="btn btn-outline-secondary active toggle-vis" data-column="3">الإسم</a>
                     <a type="button" id="4" class="btn btn-outline-secondary active toggle-vis" data-column="4">تاريخ الميلاد</a>
                     <a type="button" id="5" class="btn btn-outline-secondary active toggle-vis" data-column="5">اسم المستخدم</a>
                     <a type="button" id="6" class="btn btn-outline-secondary active toggle-vis" data-column="6">الرقم السري</a>
                     <a type="button" id="7" class="btn btn-outline-secondary active toggle-vis" data-column="7">الولاية</a>
                     <a type="button" id="8" class="btn btn-outline-secondary active toggle-vis" data-column="8">رقم الملف</a>
        </div>
        <br>
        <div class="table-responsive">
            <table class=" table  table-striped text-center table-bordered mydatatable display">
                <thead class="thead table-dark">
                    <tr>
                        <th class="select_all"><button class="btn btn-secondary col">تحديد </button> </th>
                        <th>رقم الترتيب</th>
                        <th>اللقب</th>
                        <th>الإسم</th>
                        <th>تاريخ الميلاد</th>
                        <th>اسم المستخدم</th>
                        <th>الرقم السري</th>
                        <th>الولاية</th>
                        <th>رقم الملف</th>
                    </tr>
                    <tr>
                        <th class="deselect_all"><button class="btn btn-secondary col">إلغاء</button></th>
                        <th class="thSearch"></th>
                        <th class="thSearch"></th>
                        <th class="thSearch"></th>
                        <th class="thSearch"></th>
                        <th class="thSearch"></th>
                        <th class="thSearch"></th>
                        <th class="thSearch"></th>
                        <th class="thSearch"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>1</td>
                        <td>بشرون</td>
                        <td>ادير</td>
                        <td>
                            18\5\2001
                        </td>
                        <td>idiridir2018</td>
                        <td>2018</td>
                        <td>06 - بجاية</td>
                        <td>23</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>2</td>
                        <td>كاشبي</td>
                        <td>ليديا</td>
                        <td>
                            21\5\1999
                        </td>
                        <td>kachebil</td>
                        <td>1111</td>
                        <td>06 - بجاية</td>
                        <td>16</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>3</td>
                        <td>كاشبي</td>
                        <td>ليديا</td>
                        <td>
                            21\5\1999
                        </td>
                        <td>kachebilydia</td>
                        <td>1111</td>
                        <td>06 - بجاية</td>
                        <td>17</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>4</td>
                        <td>روابح</td>
                        <td>زياد</td>
                        <td>
                            5\4\2001
                        </td>
                        <td>ziadrouabah2018</td>
                        <td>2018</td>
                        <td>06 - بجاية</td>
                        <td>19</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>5</td>
                        <td>كاشبي</td>
                        <td>ليديا</td>
                        <td>
                            21\5\1999
                        </td>
                        <td>kachebi11</td>
                        <td>1111</td>
                        <td>06 - بجاية</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>6</td>
                        <td>خلاف</td>
                        <td>فوزية</td>
                        <td>
                            17\10\2000
                        </td>
                        <td>khellaffouzia06</td>
                        <td>3512</td>
                        <td>06 - بجاية</td>
                        <td>91</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>7</td>
                        <td>هشماوي</td>
                        <td>إيدير</td>
                        <td>
                            7\9\2000
                        </td>
                        <td>idirhechmaoui</td>
                        <td>2000</td>
                        <td>06 - بجاية</td>
                        <td>106</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>8</td>
                        <td>منعة</td>
                        <td>علاوة</td>
                        <td>
                            15\1\2000
                        </td>
                        <td>menaaallaoua</td>
                        <td>2000</td>
                        <td>06 - بجاية</td>
                        <td>112</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>9</td>
                        <td>عماري</td>
                        <td>ادير</td>
                        <td>
                            30\6\2000
                        </td>
                        <td>amari2018</td>
                        <td>1234</td>
                        <td>06 - بجاية</td>
                        <td>113</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>10</td>
                        <td>أيت يحي</td>
                        <td>رضوان</td>
                        <td>
                            9\12\2000
                        </td>
                        <td>aityahiaredouane</td>
                        <td>2000</td>
                        <td>06 - بجاية</td>
                        <td>156</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>11</td>
                        <td>بن لطرش</td>
                        <td>عبد الجلال</td>
                        <td>
                            30\5\2001
                        </td>
                        <td>djalalbem12</td>
                        <td>1234</td>
                        <td>06 - بجاية</td>
                        <td>165</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>12</td>
                        <td>يونسي</td>
                        <td>فاظمة</td>
                        <td>
                            21\2\2001
                        </td>
                        <td>fatma2018</td>
                        <td>2018</td>
                        <td>06 - بجاية</td>
                        <td>169</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>13</td>
                        <td>أبربور</td>
                        <td>كنزة</td>
                        <td>
                            18\10\1996
                        </td>
                        <td>kenza96</td>
                        <td>1996</td>
                        <td>06 - بجاية</td>
                        <td>191</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>14</td>
                        <td>عزيري</td>
                        <td>عبد الكريم</td>
                        <td>
                            1\6\1983
                        </td>
                        <td>karim3062019</td>
                        <td>8306</td>
                        <td>06 - بجاية</td>
                        <td>198</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>15</td>
                        <td>سعدي</td>
                        <td>ثنصليث</td>
                        <td>
                            20\8\1998
                        </td>
                        <td>thanaslith</td>
                        <td>1998</td>
                        <td>06 - بجاية</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>16</td>
                        <td>جودري</td>
                        <td>ليدية</td>
                        <td>
                            6\9\2000
                        </td>
                        <td>djoudilydia</td>
                        <td>2000</td>
                        <td>06 - بجاية</td>
                        <td>972</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>17</td>
                        <td>إلياس</td>
                        <td>تينهينان</td>
                        <td>
                            17\5\2001
                        </td>
                        <td>tinhinane001</td>
                        <td>2255</td>
                        <td>06 - بجاية</td>
                        <td>12647</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>18</td>
                        <td>امخلاف</td>
                        <td>طاوس</td>
                        <td>
                            15\1\1995
                        </td>
                        <td>imkhlaftaous02</td>
                        <td>2020</td>
                        <td>06 - بجاية</td>
                        <td>3838</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>19</td>
                        <td>عميرات</td>
                        <td>لويزة</td>
                        <td>
                            10\4\1973
                        </td>
                        <td>amiratlouiza</td>
                        <td>1973</td>
                        <td>06 - بجاية</td>
                        <td>9969</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>20</td>
                        <td>اسعاد</td>
                        <td>عمر</td>
                        <td>
                            18\11\2002
                        </td>
                        <td>omar52</td>
                        <td>0</td>
                        <td>06 - بجاية</td>
                        <td>5882</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>21</td>
                        <td>بوزلمادن</td>
                        <td>كريمة</td>
                        <td>
                            19\9\1993
                        </td>
                        <td>karima193</td>
                        <td>1234</td>
                        <td>06 - بجاية</td>
                        <td>11341</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>22</td>
                        <td>حجيمي</td>
                        <td>صبرينة</td>
                        <td>
                            1\10\2002
                        </td>
                        <td>hadjimisabrina2002</td>
                        <td>2002</td>
                        <td>06 - بجاية</td>
                        <td>2370</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>23</td>
                        <td>خوفاش</td>
                        <td>يانيس</td>
                        <td>
                            13\9\2001
                        </td>
                        <td>yanis25</td>
                        <td>3754</td>
                        <td>06 - بجاية</td>
                        <td>14601</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>24</td>
                        <td>عزي</td>
                        <td>ماسينيسا</td>
                        <td>
                            14\10\1998
                        </td>
                        <td>azzimassinissa</td>
                        <td>1998</td>
                        <td>06 - بجاية</td>
                        <td>249</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>25</td>
                        <td>مسرور</td>
                        <td>ادريس</td>
                        <td>
                            27\8\2001
                        </td>
                        <td>idrisidris2018</td>
                        <td>2001</td>
                        <td>06 - بجاية</td>
                        <td>26</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>26</td>
                        <td>باشيوة</td>
                        <td>خير الدين</td>
                        <td>
                            15\9\2001
                        </td>
                        <td>khiradine062018</td>
                        <td>1234</td>
                        <td>06 - بجاية</td>
                        <td>14577</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>27</td>
                        <td>قرعون</td>
                        <td>سليم</td>
                        <td>
                            23\7\1999
                        </td>
                        <td>salim23</td>
                        <td>2323</td>
                        <td>06 - بجاية</td>
                        <td>14516</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>28</td>
                        <td>مسرور</td>
                        <td>ايدريس</td>
                        <td>
                            27\8\2001
                        </td>
                        <td>mesrouridris</td>
                        <td>2001</td>
                        <td>06 - بجاية</td>
                        <td>14492</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>29</td>
                        <td>بوستة</td>
                        <td>كريمو</td>
                        <td>
                            5\4\1996
                        </td>
                        <td>boustakrimou</td>
                        <td>1996</td>
                        <td>06 - بجاية</td>
                        <td>14483</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>30</td>
                        <td>بلقاسم</td>
                        <td>سوزانة</td>
                        <td>
                            25\8\2001
                        </td>
                        <td>belkacemsouzana</td>
                        <td>2019</td>
                        <td>06 - بجاية</td>
                        <td>14458</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>31</td>
                        <td>بن لعلى</td>
                        <td>كميلية</td>
                        <td>
                            17\9\1996
                        </td>
                        <td>kheireddine06</td>
                        <td>1990</td>
                        <td>06 - بجاية</td>
                        <td>14356</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>32</td>
                        <td>يعلاوي</td>
                        <td>نبيل</td>
                        <td>
                            1\1\1999
                        </td>
                        <td>nabil1234</td>
                        <td>2019</td>
                        <td>06 - بجاية</td>
                        <td>14282</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>33</td>
                        <td>قاسم</td>
                        <td>محمد</td>
                        <td>
                            17\11\1989
                        </td>
                        <td>gacemmohamed17111989</td>
                        <td>1989</td>
                        <td>06 - بجاية</td>
                        <td>14225</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>34</td>
                        <td>بوقلوش</td>
                        <td>عمر</td>
                        <td>
                            31\7\1998
                        </td>
                        <td>omar001</td>
                        <td>2019</td>
                        <td>06 - بجاية</td>
                        <td>13868</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>35</td>
                        <td>أمسيلي</td>
                        <td>غانية</td>
                        <td>
                            23\1\1994
                        </td>
                        <td>amsilighania</td>
                        <td>1994</td>
                        <td>06 - بجاية</td>
                        <td>13882</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>36</td>
                        <td>إغيت</td>
                        <td>ليدية</td>
                        <td>
                            3\8\1996
                        </td>
                        <td>ighitlydia</td>
                        <td>1996</td>
                        <td>06 - بجاية</td>
                        <td>13865</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>37</td>
                        <td>قنان</td>
                        <td>سعيد</td>
                        <td>
                            18\8\1998
                        </td>
                        <td>guenanesaid</td>
                        <td>6566</td>
                        <td>06 - بجاية</td>
                        <td>13854</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>38</td>
                        <td>سعيدي</td>
                        <td>زين الدين</td>
                        <td>
                            10\9\1991
                        </td>
                        <td>saidi06</td>
                        <td>1991</td>
                        <td>06 - بجاية</td>
                        <td>13844</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>39</td>
                        <td>بلقاسمي</td>
                        <td>موسى</td>
                        <td>
                            27\12\1994
                        </td>
                        <td>moussa123</td>
                        <td>2019</td>
                        <td>06 - بجاية</td>
                        <td>13839</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>40</td>
                        <td>بغداد</td>
                        <td>ياسمين</td>
                        <td>
                            7\3\2001
                        </td>
                        <td>beghdad2001</td>
                        <td>2001</td>
                        <td>06 - بجاية</td>
                        <td>13699</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>41</td>
                        <td>بوتقرابت</td>
                        <td>عبد الرحيم</td>
                        <td>
                            18\9\2000
                        </td>
                        <td>rahim06bem</td>
                        <td>6565</td>
                        <td>06 - بجاية</td>
                        <td>13655</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>42</td>
                        <td>بغداد</td>
                        <td>ياسمين</td>
                        <td>
                            7\3\2001
                        </td>
                        <td>beghdad06</td>
                        <td>2001</td>
                        <td>06 - بجاية</td>
                        <td>13694</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>43</td>
                        <td>قادري</td>
                        <td>حنان</td>
                        <td>
                            21\11\1999
                        </td>
                        <td>kadrihanane</td>
                        <td>1999</td>
                        <td>06 - بجاية</td>
                        <td>13180</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>44</td>
                        <td>مايري</td>
                        <td>أنايس</td>
                        <td>
                            29\12\2001
                        </td>
                        <td>mairianais</td>
                        <td>2001</td>
                        <td>06 - بجاية</td>
                        <td>13185</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>45</td>
                        <td>موهو</td>
                        <td>مسنسن</td>
                        <td>
                            6\4\2002
                        </td>
                        <td>massiqlf89</td>
                        <td>2002</td>
                        <td>06 - بجاية</td>
                        <td>13199</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>46</td>
                        <td>قويري</td>
                        <td>عبد الحكيم</td>
                        <td>
                            3\9\2000
                        </td>
                        <td>hakim2000</td>
                        <td>2000</td>
                        <td>06 - بجاية</td>
                        <td>13208</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>47</td>
                        <td>قاسمي</td>
                        <td>إدير</td>
                        <td>
                            10\6\2000
                        </td>
                        <td>kasmiidir</td>
                        <td>2000</td>
                        <td>06 - بجاية</td>
                        <td>13294</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>48</td>
                        <td>نايت قاضي</td>
                        <td>فتيحة</td>
                        <td>
                            10\2\1990
                        </td>
                        <td>naitkadi1990</td>
                        <td>1990</td>
                        <td>06 - بجاية</td>
                        <td>13349</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>49</td>
                        <td>بوكريف</td>
                        <td>نادية</td>
                        <td>
                            27\8\2002
                        </td>
                        <td>boukrif</td>
                        <td>2002</td>
                        <td>06 - بجاية</td>
                        <td>13399</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>50</td>
                        <td>عبدلي</td>
                        <td>صاره</td>
                        <td>
                            4\2\2001
                        </td>
                        <td>abdelisara</td>
                        <td>2001</td>
                        <td>06 - بجاية</td>
                        <td>13418</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>51</td>
                        <td>عروش</td>
                        <td>ليلية</td>
                        <td>
                            22\4\1999
                        </td>
                        <td>arrouchelylia</td>
                        <td>2123</td>
                        <td>06 - بجاية</td>
                        <td>13446</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>52</td>
                        <td>يوسف خوجة</td>
                        <td>إسلام</td>
                        <td>
                            19\12\2000
                        </td>
                        <td>youcislam</td>
                        <td>2003</td>
                        <td>06 - بجاية</td>
                        <td>13521</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>53</td>
                        <td>بن بركان</td>
                        <td>صبرينة</td>
                        <td>
                            14\1\1996
                        </td>
                        <td>sabrina96</td>
                        <td>1996</td>
                        <td>06 - بجاية</td>
                        <td>13529</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>54</td>
                        <td>وزان</td>
                        <td>سوزان</td>
                        <td>
                            15\9\2001
                        </td>
                        <td>ouazenesaouzane2019</td>
                        <td>2019</td>
                        <td>06 - بجاية</td>
                        <td>13576</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>55</td>
                        <td>زغار</td>
                        <td>يعقوب</td>
                        <td>
                            11\5\2001
                        </td>
                        <td>yakoub01</td>
                        <td>2001</td>
                        <td>06 - بجاية</td>
                        <td>13578</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>56</td>
                        <td>عاشوري</td>
                        <td>سامية</td>
                        <td>
                            22\3\1985
                        </td>
                        <td>achourisamia</td>
                        <td>1985</td>
                        <td>06 - بجاية</td>
                        <td>13618</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>57</td>
                        <td>فركان</td>
                        <td>مسينيسا</td>
                        <td>
                            17\2\2001
                        </td>
                        <td>ferkanmassinissa</td>
                        <td>2001</td>
                        <td>06 - بجاية</td>
                        <td>13620</td>
                    </tr>
                </tbody>
            </table>
        </div>




</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>