@echo off
set date = %date%_%time%
git add --all
git commit -m "%date%"
git push
