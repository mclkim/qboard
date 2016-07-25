@echo off
SET ZipPath="C:\Program Files\7-Zip\7zG.exe"
SET SourcePath="D:\phpdev\workspace\qhard"
SET BackupPath="D:\backup\qhard"
SET BackupFile="qhard-%date%.zip"
%ZipPath% a -tzip %BackupPath%\%BackupFile% %SourcePath%\*.php %SourcePath%\*.html %SourcePath%\*.js %SourcePath%\*.css %SourcePath%\*.xml -r
