class CV_class:
    def __init__(self):
        self.formation = []
        self.compétence = []
        self.profil = []
        self.contacts = []
        self.langue = []
        self.loisir = []
        self.projet = []
        self.experience = []

    key_words = {
        "formation": ["éducation", "formation", "qualifications", "certifications", "diplômes", "ateliers",
                      "séminaires", "diplomas", "apprentissages", "parcours"],
        "compétence": ["compétences", "capacités", "expertises", "compétences techniques", "compétences douces",
                       "maîtrise des langues", "compétences analytiques", "compétences en communication",
                       "compétences en leadership", "compétences en résolution de problèmes", "travail d'équipe",
                       "gestion du temps", "adaptabilité", "créativité", "skills", "abilities", "competencies",
                       "expertise", "technical skills", "soft skills", "language proficiency", "analytical skills",
                       "communication skills", "leadership skills", "problem-solving skills", "teamwork",
                       "time management", "adaptability", "creativity"],
        "profil": ["profil", "résumé", "objectif", "à propos de moi", "résumé professionnel", "résumé de carrière",
                   "déclaration personnelle", "objectif de carrière", "profil professionnel", "réalisations clés",
                   "objectifs de carrière", "forces", "aspirations de carrière", "déclaration de mission",
                   "proposition de valeur", "profile", "summary", "objective", "about me", "professional summary",
                   "career summary", "personal statement", "career objective", "professional profile",
                   "key achievements", "career goals", "strengths", "career aspirations", "mission statement",
                   "value proposition"],
        "contacts": ["coordonnées", "détails de contact", "informations personnelles", "adresse", "numéro de téléphone",
                     "adresse email", "profil linkedin", "site web", "liens des réseaux sociaux",
                     "réseautage professionnel", "contact information", "contact details", "personal information",
                     "address", "phone number", "email address", "linkedin profile", "website", "social media links",
                     "professional networking", "contact"],
        "langue": ["langues", "language skills", "langue maternelle", "langue étrangère", "niveau de langue",
                   "langues maîtrisées", "language", "mother tongue", "foreign language", "language proficiency",
                   "language level"],
        "projet": ["projets", "projet" ,"projects", "project experience", "personal projects", "professional projects",
                   "project management", "project development", "project execution", "project planning",
                   "project coordination"],
        "experience": ["expérience", "experience", "work experience", "professional experience", "job experience", "work history",
                       "employment history", "career history"],
        "loisir": ["loisirs", "intérêts", "passions", "hobbies", "interests"]
    }

    def extract_values(self, TXT):
        lines = [line.strip() for line in TXT.split('\n') if line.strip()]
        print(TXT)
        att=""
        for line in lines:
            for attribute, elements in self.key_words.items():
                for element in elements:
                    if line.lower().split()[0] == element:
                        att = attribute
            if hasattr(self, att):
                getattr(self, att).append(line)

        return self
