import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import confusion_matrix, classification_report, roc_curve, auc
import matplotlib.pyplot as plt
from imblearn.over_sampling import SMOTE


# Ejemplo usando el dataset de diabetes
df = pd.read_csv("diabetes.csv")

X = df.drop("Outcome", axis=1)
y = df["Outcome"]

X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42, stratify=y
)

# Escalado
scaler = StandardScaler()
X_train_scaled = scaler.fit_transform(X_train)
X_test_scaled = scaler.transform(X_test)

model_base = LogisticRegression(max_iter=500)
model_base.fit(X_train_scaled, y_train)

y_pred_base = model_base.predict(X_test_scaled)
y_prob_base = model_base.predict_proba(X_test_scaled)[:, 1]

print("\n======= RESULTADOS SIN SMOTE =======")
print(classification_report(y_test, y_pred_base))
print("Matriz de confusión (sin SMOTE):")
print(confusion_matrix(y_test, y_pred_base))


smote = SMOTE(random_state=42)
X_train_sm, y_train_sm = smote.fit_resample(X_train_scaled, y_train)

print("\nDistribución original:", y_train.value_counts().to_dict())
print("Distribución con SMOTE:", y_train_sm.value_counts().to_dict())

model_smote = LogisticRegression(max_iter=500)
model_smote.fit(X_train_sm, y_train_sm)

y_pred_smote = model_smote.predict(X_test_scaled)
y_prob_smote = model_smote.predict_proba(X_test_scaled)[:, 1]

print("\n======= RESULTADOS CON SMOTE =======")
print(classification_report(y_test, y_pred_smote))
print("Matriz de confusión (con SMOTE):")
print(confusion_matrix(y_test, y_pred_smote))

fpr_base, tpr_base, _ = roc_curve(y_test, y_prob_base)
roc_auc_base = auc(fpr_base, tpr_base)

fpr_smote, tpr_smote, _ = roc_curve(y_test, y_prob_smote)
roc_auc_smote = auc(fpr_smote, tpr_smote)

plt.figure(figsize=(8, 6))
plt.plot(fpr_base, tpr_base, label=f"Modelo base (AUC = {roc_auc_base:.3f})")
plt.plot(fpr_smote, tpr_smote, label=f"SMOTE (AUC = {roc_auc_smote:.3f})")
plt.plot([0, 1], [0, 1], "k--")
plt.xlabel("Tasa de Falsos Positivos")
plt.ylabel("Tasa de Verdaderos Positivos")
plt.title("Curva ROC - Comparación")
plt.legend()
plt.show()
