---
marp: true
theme: default
paginate: true
backgroundColor: #fff
header: '📊 Goals Tracker Project'
footer: 'Réalisé par Abdelhay Mallouli'
style: |
  section {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
  }
  img {
    display: block;
    margin: 0 auto;
    border-radius: 8px;
  }
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

<img src="imgs/2tup.png" alt="2TUP Methodology" />

---

# Analyse technique

# Les technologies à utiliser

1. Base de données : MySQL
2. Architecture : N-Tiers. 
3. Framework : Laravel 12  
4. architecture : MVC
5. moteur de vues : Blade
6. Ajax 
7. Upload image 
8. laravel multilangue
9. Vite
10. Preline UI library 
11. luicide library 




---

# Analyse Fonctionnelle

## cas d'utilisation  

<img src="imgs/cas Dutilisation/cas.png" alt="cas d'utilisation public" style="width:50%; margin-top:10px;" />



--- 
# Conception

## Diagramme de Classes

<div style="text-align: center;">
  <img src="imgs/diagram class.png" alt="diagram class" style="max-height: 400px; width: auto; object-fit: contain;" />
</div>
--- 

# Sujet - Live coding
- Un bouton “Ajouter” qui ouvre une modale pour créer un nouvel élément.
- Une barre de recherche filtrant des éléments par titre.