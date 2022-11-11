# *** スクレイピングロジック ***
# --- ライブラリ管理 ---
from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import time
# 余分なワーニングを非表示にする
import warnings
warnings.filterwarnings('ignore')
#ヘッドレスモードでブラウザを起動
options = Options()
options.add_argument('--headless')
import pandas as pd
# --- メインロジック ---
# 変数管理
tyusenbi_text = []
kaibetsu_text = []
tyusenNo_text = []
driver = webdriver.Chrome(ChromeDriverManager().install(), options=options)
# urlの場所にアクセス
url = 'https://takarakuji.rakuten.co.jp/backnumber/numbers3_past/'
driver.get(url)
# 昨年以前の当選番号案内の収集アルゴリズム
for home_path_1st in range(1,97): # 縦列
    for home_path_2nd in range(1,4): # 横列
        # ID_element
        ID_news = driver.find_element(By.ID,"js-takarakuji")
        ID_news.find_element(By.XPATH,f'//*[@id="backnumber"]/table[2]/tbody/tr[{home_path_1st}]/td[{home_path_2nd}]/ul/li/a').click()
        time.sleep(3)
        for path_3rd in range(2,22):
            # 開催回を取得
            kaibetsu  = driver.find_element(By.CSS_SELECTOR,f'#backnumber > table > tbody > tr:nth-child({path_3rd}) > td:nth-child(1)')
            kaibetsu_text.append(kaibetsu.text)
            # 抽選日を取得
            tyusenbi = driver.find_element(By.CSS_SELECTOR,f'#backnumber > table > tbody > tr:nth-child({path_3rd}) > td:nth-child(2)')
            tyusenbi_text.append(tyusenbi.text)
            # 抽選数字を取得
            tyusenNo = driver.find_element(By.CSS_SELECTOR,f'#backnumber > table > tbody > tr:nth-child({path_3rd}) > td:nth-child(3)')
            tyusenNo_text.append(tyusenNo.text)
        time.sleep(3)
        driver.find_element(By.XPATH,'//*[@id="js-takarakuji"]/div[1]/ol/li[3]/a/span').click()
        time.sleep(3)
print("skraping complete!!")
driver.close()
# --- 保存ロジック
df = pd.DataFrame(data={'開催回':kaibetsu_text,'抽選日':tyusenbi_text,'抽選数字':tyusenNo_text})
df.to_csv('lev_Predict.csv')
print("SAVE-CSV complete!!")