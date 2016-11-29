@echo off
SET ZipPath="C:\Program Files\7-Zip\7zG.exe"
SET SourcePath="D:\phpdev\workspace\qboard"
rem SET SourcePath="C:\Users\Administrator\OneDrive\qboard"
SET BackupPath="D:\backup\qboard"
SET BackupFile="qboard-%date%.zip"
%ZipPath% a -tzip %BackupPath%\%BackupFile% %SourcePath%\*.php %SourcePath%\*.html %SourcePath%\*.js %SourcePath%\*.css %SourcePath%\*.xml -r
