## coding: UTF-8
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
print("end0")
df_old = pd.read_csv('./public/csv/lev_Predict.csv')
df_new = pd.read_csv('./public/csv/lev_Predict_new.csv')
data = df_old.append(df_new)
print("end1")
data = data.reset_index().drop(['Unnamed: 0','index'],axis=1)
data['抽選日'] = pd.to_datetime(data['抽選日'])
data['抽選数字'] = data['抽選数字'].astype(str).str.zfill(3)
data['year'] = data['抽選日'].dt.year
data['month'] = data['抽選日'].dt.month
data['day'] = data['抽選日'].dt.day
data['weekday'] = data['抽選日'].dt.weekday
data['hundred'] = 0
data['ten'] = 0
data['one'] = 0
for extract in range(len(data)):
    data_extract = data['抽選数字'][extract]
    data['hundred'][extract] = data_extract[0]
    data['ten'][extract] = data_extract[1]
    data['one'][extract] = data_extract[2]
data.to_csv('./public/csv/lev_Predict_all.csv')
df = pd.read_csv('./public/csv/lev_Predict_all.csv').drop('Unnamed: 0',axis=1)
df_x = df.drop(['開催回','抽選数字','hundred','ten','one'],axis=1)
df_hundred_x = df.drop(['抽選数字','hundred','ten','one'],axis=1)
df_ten_x = df.drop(['抽選数字','hundred','ten','one'],axis=1)
df_one_x = df.drop(['抽選数字','hundred','ten','one'],axis=1)
df_y = df['抽選数字']
df_hundred_y = df['hundred']
df_ten_y = df['ten']
df_one_y = df['one']
df_x = pd.get_dummies(df_x)
train_x, test_x, train_y, test_y = train_test_split(df_x, df_y, random_state=1)
dtrain = xgb.DMatrix(train_x, label=train_y)
dtest  = xgb.DMatrix(test_x, label=test_y)
params = {'objective':'reg:linear','silent':1,'random_state':1}
num_round = 50
watchlist = [(dtrain, 'train'), (dtest, 'test')]
model = xgb.train(params, dtrain, num_round, verbose_eval=10, evals=watchlist)
pred = model.predict(dtest)
ans_pred = pd.DataFrame(pred).astype(int)
five_ans = ans_pred[0][0:5]
five_ans.to_csv('./public/csv/test.csv', header=False, encoding='utf_8_sig')
ans_pred.to_csv('./public/csv/test2.csv', header=False, encoding='utf_8_sig')
