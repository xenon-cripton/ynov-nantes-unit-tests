FROM python:slim

# working directory
WORKDIR /app

# we don't have dependencies, but if we had, this would be needed
# COPY requirements.txt ./
# RUN pip install --no-cache-dir -r requirements.txt

COPY . .

ENTRYPOINT ["python"]