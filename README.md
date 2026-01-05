---
marp: true
theme: default
paginate: true
backgroundColor: #fff
header: '📊 Goals Tracker Project'
footer: 'Réalisé par Abdelhay Mallouli'
---

# Projet technique 
## Goals Tracker Website (Suivi des Objectifs)

**Réalisé par :**  
MALLOULI Abdelhay    

**Encadré par :**  
M. ESSARRAJ Fouad

---

# Contexte du projet
- Projet pour appliquer les connaissances acquises  
- Suivi des objectifs personnels ou professionnels  
- Méthodologie **2TUP** : Fonctionnel / Technique / Réalisation  
- Préparation pour **démonstration live**  

<img src="imgs/2tup.png" alt="2TUP Methodology" style="width:50%; margin-top:10px;" />

---

# Analyse technique

---
# Les technologies à utiliser

## Front-End
- Blade : Templates réutilisables (components, layouts)  
- Tailwind CSS : Développement rapide et responsive  
- Preline UI : Composants intégrés (modales, boutons…)  
- Lucide : Icônes  

---
## Back-End et Architecture
- Framework : Laravel 12  
- Langage : PHP 8.2
- Base de données : MySQL
- Architecture N-Tiers :  
  - Controller : Requêtes HTTP  
  - Service : Logique métier  
  - Model : Base de données  

---

## Fonctionnalités
- AJAX : Interactions dynamiques (ex: modales, mise à jour de progression) sans rechargement  
- Téléchargement de fichiers : Possibilité de joindre des fichiers/images aux objectifs  
- Support Multi-langue : Français et Anglais (fr, en)  


---

# Analyse Fonctionnelle

## cas d'utilisation public 

<img src="imgs/cas Dutilisation/public.png" alt="cas d'utilisation public" style="width:50%; margin-top:10px;" />

---
## cas d'utilisation admin

<img src="imgs/cas Dutilisation/admin.png" alt="cas d'utilisation admin" style="width:50%; margin-top:10px;" />

