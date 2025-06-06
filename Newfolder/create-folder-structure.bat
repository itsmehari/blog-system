@echo off
:: Create folders
mkdir blog\admin
mkdir blog\assets\css
mkdir blog\assets\js
mkdir blog\assets\images
mkdir blog\includes
mkdir blog\uploads

:: Create admin files
echo.> blog\admin\login.php
echo.> blog\admin\logout.php
echo.> blog\admin\index.php
echo.> blog\admin\dashboard.php
echo.> blog\admin\post-create.php
echo.> blog\admin\post-edit.php
echo.> blog\admin\media-upload.php
echo.> blog\admin\user-profile.php

:: Create asset files
echo.> blog\assets\css\style.css
echo.> blog\assets\js\blog.js

:: Create include files
echo.> blog\includes\db.php
echo.> blog\includes\config.php
echo.> blog\includes\functions.php
echo.> blog\includes\auth.php
echo.> blog\includes\head.php
echo.> blog\includes\header.php
echo.> blog\includes\footer.php

:: Create blog root files
echo.> blog\index.php
echo.> blog\post.php
echo.> blog\category.php
echo.> blog\tag.php
echo.> blog\search.php
echo.> blog\rss.php
echo.> blog\404.php

echo Blog folder structure created successfully.
pause
