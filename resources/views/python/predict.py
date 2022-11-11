# *** 予測ロジック ***
# --- ライブラリ管理 --- 
import warnings
warnings.filterwarnings('ignore')
import pandas as pd
import numpy as np
import math
import calendar
import datetime
# モデルライブラリ
from sklearn.model_selection import train_test_split
import xgboost as xgb
from sklearn.metrics import log_loss

# --- クラス管理 ---
def get_day_of_nth_dow(year, month, nth, dow):
    '''dow: Monday(0) - Sunday(6)'''
    if nth < 1 or dow < 0 or dow > 6:
        return None
    first_dow, n = calendar.monthrange(year, month)
    day = 7 * (nth - 1) + (dow - first_dow) % 7 + 1
    return day if day <= n else None
# --- メインロジック ---
# データのインポート
df_old = pd.read_csv('./public/csv/lev_Predict.csv')
df_new = pd.read_csv('./public/csv/lev_Predict_new.csv')
data = df_old.append(df_new)
data = data.reset_index().drop(['Unnamed: 0','index'],axis=1)
data['抽選日'] = pd.to_datetime(data['抽選日'])
# ゼロパディング
data['抽選数字'] = data['抽選数字'].astype(str).str.zfill(3)
# 日付の分配（年・月・日に分ける）
data['year'] = data['抽選日'].dt.year
data['month'] = data['抽選日'].dt.month
data['day'] = data['抽選日'].dt.day
# 曜日情報を追加（月曜:0, 火曜:1, 水曜2, 木曜:3, 金曜:4, 土曜:5, 日曜:6）
data['weekday'] = data['抽選日'].dt.weekday
# データ加工(100の位・10の位・1の位)
data['hundred'] = 0
data['ten'] = 0
data['one'] = 0
for extract in range(len(data)):
    data_extract = data['抽選数字'][extract]
    data['hundred'][extract] = data_extract[0]
    data['ten'][extract] = data_extract[1]
    data['one'][extract] = data_extract[2]
data.to_csv('./public/csv/lev_Predict_all.csv')

# データのインポート
df = pd.read_csv('./public/csv/lev_Predict_all.csv').drop('Unnamed: 0',axis=1)
# 説明変数(x)
df_x = df.drop(['開催回','抽選数字','hundred','ten','one'],axis=1)
df_hundred_x = df.drop(['抽選数字','hundred','ten','one'],axis=1)
df_ten_x = df.drop(['抽選数字','hundred','ten','one'],axis=1)
df_one_x = df.drop(['抽選数字','hundred','ten','one'],axis=1)
# 目的変数(y)
df_y = df['抽選数字'] # 抽選数字を当てる
df_hundred_y = df['hundred'] # hundredを当てる
df_ten_y = df['ten'] # tenを当てる
df_one_y = df['one'] # oneを当てる
df_x = pd.get_dummies(df_x)

# --- 抽選数字出力ロジック ---
# 学習用-テスト用に分割
train_x, test_x, train_y, test_y = train_test_split(df_x, df_y, random_state=1)
dtrain = xgb.DMatrix(train_x, label=train_y)
dtest  = xgb.DMatrix(test_x, label=test_y)
params = {'objective':'reg:linear','silent':1,'random_state':1}
num_round = 50
watchlist = [(dtrain, 'train'), (dtest, 'test')]
model = xgb.train(params, dtrain, num_round, verbose_eval=10, evals=watchlist)
pred = model.predict(dtest)
ans_pred = pd.DataFrame(pred).astype(int)
# 出力優先順位5位
five_ans = ans_pred[0][0:5]
five_ans.to_csv('./public/csv/five_predict.csv', header=False, encoding='utf_8_sig')
# 他の出力結果をcsvに保存（オプション）
ans_pred.to_csv('./public/csv/predict.csv', header=False, encoding='utf_8_sig')