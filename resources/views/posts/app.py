## coding: UTF-8
print("test5")
print("スタート")

import pandas as pd
import numpy as np
import math
import calendar
import datetime
from sklearn.model_selection import train_test_split
import xgboost as xgb
from sklearn.metrics import log_loss
def get_day_of_nth_dow(year, month, nth, dow):
    '''dow: Monday(0) - Sunday(6)'''
    if nth < 1 or dow < 0 or dow > 6:
        return None
    first_dow, n = calendar.monthrange(year, month)
    day = 7 * (nth - 1) + (dow - first_dow) % 7 + 1
    return day if day <= n else None
df_old = pd.read_csv('./public/csv/lev_Predict.csv')
df_new = pd.read_csv('./public/csv/lev_Predict_new.csv')
data = df_old.append(df_new)
data = data.reset_index().drop(['Unnamed: 0','index'],axis=1)