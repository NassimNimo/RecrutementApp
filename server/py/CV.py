import sys
from pdfminer.high_level import extract_text
from cv_module import CV_class

# Print the command-line arguments for debugging
print("Command-line arguments:", sys.argv)

# Ensure the correct command-line arguments are provided
if len(sys.argv) < 2:
    print("Usage: python CV.py <path_to_pdf>")
    sys.exit(2)

# Extract text from the PDF file
pdf_path = sys.argv[1]
print(pdf_path)
try:
    text = extract_text(pdf_path)
except Exception as e:
    print("An error occurred while extracting text from the PDF:", e)
    sys.exit(1)

# Create an instance of CV_class and extract sections
cv = CV_class()
cv.extract_values(text)

# Access the extracted sections
print("Formation:", cv.formation)
print("Compétence:", cv.compétence)
print("Profil:", cv.profil)
print("Contacts:", cv.contacts)
print("Langue:", cv.langue)
print("Loisir:", cv.loisir)
print("Projet:", cv.projet)
print("Experience:", cv.experience)
