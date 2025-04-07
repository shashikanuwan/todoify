FROM node:18

# Set working directory
WORKDIR /app

# Copy the frontend project files into the container
COPY frontend/ .

# Install dependencies
RUN npm install

# Build the frontend
RUN npm run build

# Expose the container port (adjust port if needed)
EXPOSE 8080

# Start the Vue.js application
CMD ["npm", "run", "serve"]
